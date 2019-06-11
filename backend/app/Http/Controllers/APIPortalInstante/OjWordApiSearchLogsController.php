<?php

namespace App\Http\Controllers\Oj\APIPortalInstante;

use App\Http\Controllers\Controller;
use App\Models\ClaimFile;
use App\Models\Oj\APIPortalInstante\OjWordApiSearchLog;
use App\Models\Oj\OjClaim;
use App\Models\Oj\OjClaimDomain;
use App\Models\Oj\OjClaimFile;
use App\Models\Oj\OjClaimStatus;
use App\Models\Oj\OjClaimType;
use App\Models\Oj\OjCourt;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OjWordApiSearchLogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param $request
     * @return mixed
     */
    public function index(Request $request)
    {
        $items = OjWordApiSearchLog::with('oj_word')
        ->where('oj_word_id', $request->input('oj_word_id'))
            ->orderBy('last_modified', 'DESC');
        return $items->paginate(50);
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
        $item = OjWordApiSearchLog::with('oj_word')
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
