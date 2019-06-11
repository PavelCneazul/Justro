<?php

namespace App\Http\Controllers;

use App\Helpers\ApiPortalInstante\APISearch;
use App\Helpers\ApiPortalInstante\APISearchClaimsJob;
use App\Models\Claim;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ClaimsController extends Controller
{

    public function index(Request $request)
    {
        $claim = Claim::with('user','judgement_terms','api_search_logs','hearings','parts')
            ->whereNotNull('id')
            ->where('user_id','=',$request->user->id);


        return $claim->get();
    }

    public function store(Request $request)
    {

        $claim = new Claim;
        $claim->user_id = $request->user->id;
        $claim->claim_number = $request->input('claim_number');


        $claim->save();
        $apiSearch = new APISearch;
        $searchResult = APISearchClaimsJob::useApi($apiSearch, $claim);



        //do actions with/in claim based on search result
        APISearchClaimsJob::doActionsInClaimBasedOnSearchResult($claim, $searchResult);

        return $claim;
    }


    public function show($id)
    {
        return Claim::with('user','judgement_terms','api_search_logs','hearings','parts')
                ->find($id);
    }

    public function update(Request $request, $id)
    {
        $claim = Claim::find($id);
        $claim->claim_number = $request->input('claim_number');

        $claim->save();

        return $claim;
    }

    function destroy($id)
    {

        $claim = Claim::find($id);
        $claim->delete();
    }
}
