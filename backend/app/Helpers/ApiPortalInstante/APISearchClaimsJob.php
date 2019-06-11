<?php
/**
 * Created by PhpStorm.
 * User: dexterionut
 * Date: 15/08/2017
 * Time: 11:10
 */

namespace App\Helpers\ApiPortalInstante;


use App\Helpers\NotificationsHelper;
use App\Models\Claim;
use App\Models\ClaimApiSearchLog;

use App\Models\ClaimHearing;
use App\Models\ClaimJudgementTerm;
use App\Models\ClaimPart;
use App\Models\Notification;
use App\Modules\Users\Models\User;


abstract class APISearchClaimsJob
{
    public static function runSearchClaims()
    {
        $Claims = Claim::all();


        $apiSearch = new APISearch;

        foreach ($Claims as $Claim) {
            //query api for claim info
            $searchResult = self::useApi($apiSearch, $Claim);

            //go to next claim if there is no data fetched
            if (!count($searchResult) > 0) {
                continue;
            }

            //do actions with/in claim based on search result
            self::doActionsInClaimBasedOnSearchResult($Claim, $searchResult);
        }


        return "DONE";


    }

    public static function useApi(APISearch $apiSearch, $claim)
    {
        if ($claim->claim_number) {
            return $apiSearch->cautaDupaNumarDosar($claim->claim_number);
        } else
            return [];
    }

    /**
     * Notify all the Oj users about the claim's update
     *
     * @param $description
     * @param $Claim
     * @param $ojWord
     * @param $logId
     */
    private static function notifyUsers($description = NULL, $Claim, $ojWord = NULL, $logId = NULL)
    {
        //get user ids from OJ department


        if ($Claim) {
            //used for on click actions if necessary
            $extra = [
                'claim_id' => $Claim->id,
                'log_id' => $logId
            ];

            if (!$description) {
                //notification's body
                $description = "S-a actualizat dosarul cu numarul \"$Claim->claim_number\" pe platforma instantelor.";

            }
        }


        if (isset($extra) && isset($description)) {


            NotificationsHelper::sendNotification($Claim->user_id, $extra, $description);

        }
    }

    private static function getModifiedDateAndNextTerm($result)
    {
        $maxDate = null;
        $nextTerm = null;
        foreach ($result as $item) {
            if (strtotime($item->dataModificare) > strtotime($maxDate)) {
                $maxDate = $item->dataModificare;
            }

            if (isset($item->sedinte->DosarSedinta)) {

                $isArray = is_array($item->sedinte->DosarSedinta);
                if ($isArray && strtotime($item->sedinte->DosarSedinta[0]->data) > strtotime($nextTerm)) {
                    $nextTerm = $item->sedinte->DosarSedinta[0]->data;
                }
                if (!$isArray) {
                    $nextTerm = $item->sedinte->DosarSedinta->data;
                }
            }
        }
        return [$maxDate, $nextTerm];
    }

    /**
     * @param $Claim
     * @param $searchResult
     */
    public static function doActionsInClaimBasedOnSearchResult($Claim, $searchResult)
    {
        //get last known term of the claim from database
        $currentTerm = $Claim->judgement_terms()
            ->orderBy('term_date', 'DESC')
            ->first();
        //get date if exists
        if ($currentTerm) {
            $currentTerm = $currentTerm->term_date;
        }

        //get previous api search log for this claim
        $previousLog = $Claim->api_search_logs()
            ->orderBy('created_at', 'DESC')
            ->first();

        //get last modified date and next term from the search result
        list($lastModifiedDate, $nextTerm) = self::getModifiedDateAndNextTerm($searchResult);

        //if the next term is greater than the last known term from the database, create a new one
        if (isset($nextTerm) && strtotime($nextTerm) > strtotime($currentTerm)) {
            ClaimJudgementTerm::create([
                'claim_id' => $Claim->id,
                'term_date' => $nextTerm
            ]);

            //send notifications to OJ users
            $description = "A aparut un nou termen in dosarul cu numarul \"$Claim->claim_number\" pe data de $nextTerm";
            self::notifyUsers($description, $Claim, null);
        }

        //create a new log only if the last_modified or next term are different from the previous api search log
        if ((!$previousLog) ||
            (strtotime($lastModifiedDate) > strtotime($previousLog->last_modified)) ||
            (strtotime($nextTerm) > strtotime($currentTerm))
        ) {
            $log = ClaimApiSearchLog::create([
                'claim_id' => $Claim->id,
                'data' => $searchResult,
                'last_modified' => $lastModifiedDate,
                'next_term' => $nextTerm
            ]);
            //create parts only if no previous log is found.


            //don't send notifications for new judgement term(notified already on line 69)
            if (!(strtotime($nextTerm) > strtotime($currentTerm))) {
                //send notifications to OJ users
                self::notifyUsers(null, $Claim, null, $log->id);
            }
        }

        if (!$previousLog && isset($searchResult[0]->parti->DosarParte))
            foreach ($searchResult[0]->parti->DosarParte as $part)
                ClaimPart::create([
                    'part_name' => $part->nume,
                    'part_role' => $part->calitateParte,
                    'claim_id' => $Claim->id
                ]);
        if (!$previousLog)
            Claim::where('id', $Claim->id)
                ->update(['date' => $searchResult[0]->data,
                    'institution' => $searchResult[0]->institutie,
                    'claim_category' => $searchResult[0]->categorieCazNume,
                    'claim_object' => $searchResult[0]->obiect,
                    'claim_stage' => $searchResult[0]->stadiuProcesualNume]);

        if (!$previousLog && isset($searchResult[0]->sedinte->DosarSedinta)) {
            if (!is_array($searchResult[0]->sedinte->DosarSedinta)) {
                $searchResult[0]->sedinte->DosarSedinta = [
                    $searchResult[0]->sedinte->DosarSedinta
                ];
            }

            foreach ($searchResult[0]->sedinte->DosarSedinta as $hearing) {
                ClaimHearing::create([
                    'case' => $hearing->complet,
                    'date' => $hearing->data,
                    'hour' => $hearing->ora,
                    'solution' => $hearing->solutie,
                    'solution_summary' => $hearing->solutieSumar,
                    'sentencing_date' => $hearing->dataPronuntare,
                    'hearing_document' => $hearing->documentSedinta,
                    'document_number' => $hearing->numarDocument,
                    'document_date' => $hearing->dataDocument,
                    'claim_id' => $Claim->id
                ]);
            }
        } else if (isset($searchResult[0]->sedinte->DosarSedinta)) {
            $hearings = ClaimHearing::all();

            if (!is_array($searchResult[0]->sedinte->DosarSedinta)) {
                $searchResult[0]->sedinte->DosarSedinta = [
                    $searchResult[0]->sedinte->DosarSedinta
                ];
            }
            if (count($searchResult[0]->sedinte->DosarSedinta) > count($hearings)) {
                $slice = array_slice((array)$searchResult[0]->sedinte->DosarSedinta, 0, count($searchResult[0]->sedinte->DosarSedinta) - count($hearings));
                foreach ($slice as $hearing) {
                    ClaimHearing::create([
                        'case' => $hearing->complet,
                        'date' => $hearing->data,
                        'hour' => $hearing->ora,
                        'solution' => $hearing->solutie,
                        'solution_summary' => $hearing->solutieSumar,
                        'sentencing_date' => $hearing->dataPronuntare,
                        'hearing_document' => $hearing->documentSedinta,
                        'document_number' => $hearing->numarDocument,
                        'document_date' => $hearing->dataDocument,
                        'claim_id' => $Claim->id
                    ]);
                }
            }


        }
    }
}