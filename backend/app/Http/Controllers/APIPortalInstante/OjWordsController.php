<?php

namespace App\Http\Controllers\Oj\APIPortalInstante;

use App\Http\Controllers\Controller;
use App\Models\Oj\APIPortalInstante\OjWord;
use Illuminate\Http\Request;

class OjWordsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param $request
     * @return mixed
     */
    public function index(Request $request)
    {
        $items = OjWord::whereNotNull('id');
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
        $queryParams = $request->json()->all();
        $item = OjWord::create($queryParams);

        return $item;
    }


    public function show(Request $request, $id)
    {
        $item = OjWord::find($id);
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
        $item = OjWord::find($id);
        if(!$item)
            abort(404);
        $queryParams = $request->json()->all();

        $item->update($queryParams);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return mixed
     */
    public function destroy($id)
    {
        $item = OjWord::find($id);
        if(!$item)
            abort(404);

        $item->delete();

        return "Deleted";
    }
}
