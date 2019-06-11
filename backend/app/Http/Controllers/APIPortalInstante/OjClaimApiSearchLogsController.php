<?php

namespace App\Http\Controllers\APIPortalInstante;

use App\Http\Controllers\Controller;
use App\Models\ClaimFile;
use App\Models\Helper;
use App\Models\ClaimApiSearchLog;
use App\Models\Oj\OjClaim;
use App\Models\Oj\OjClaimDomain;
use App\Models\Oj\OjClaimFile;
use App\Models\Oj\OjClaimStatus;
use App\Models\Oj\OjClaimType;
use App\Models\Oj\OjCourt;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OjClaimApiSearchLogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param $request
     * @return mixed
     */
    public function index(Request $request)
    {
        $items = ClaimApiSearchLog::with('oj_claim')
            ->orderBy('last_modified', 'DESC');

        if($request->has('oj_claim_type')) {
            $wordType = $request->input('oj_claim_type');
            $items->where('oj_claim_type', $wordType);
        }

        if ($request->has('q')) {
            $filteredLog = [];
            $word = $request->input('q');
            foreach ($items->get() as $item) {

                if (strpos($item->oj_claim->instance_claim_number, $word) !== false) {
                    array_push($filteredLog, $item);
                }
            }
            $items = $filteredLog;
        }
        $items = is_array($items) ? Helper::customPaginate($items) : $items->paginate(50);

        return $items;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        //TODO complete if needed
    }


    public function show(Request $request, $id)
    {
        $item = ClaimApiSearchLog::with('oj_claim')
            ->find($id);
        if(!$item)
            abort(404);

        return $item;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return mixed
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return mixed
     */
    public function destroy($id)
    {
        //
    }
}
