<?php
/**
 * Created by PhpStorm.
 * User: dexterionut
 * Date: 14/08/2017
 * Time: 02:20
 */

namespace App\Modules\Users\Controllers;


use App\Modules\Users\Services\GroupsService;
use Illuminate\Http\Request;

class GroupsController
{
    protected $groupsService;

    /**
     * UsersController constructor.
     * @param $groupsService
     */
    public function __construct(GroupsService $groupsService)
    {
        $this->groupsService = $groupsService;
    }


    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        $params = $request->all();
        return $this->groupsService->getAllPaginated($params);
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param  int $id
     * @return mixed
     */
    public function show(Request $request, $id)
    {
        $params = $request->json()->all();
        return $this->groupsService->getOne($id, $params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $params = $request->json()->all();
        return $this->groupsService->create($params);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int $id
     * @return mixed
     */
    public function update(Request $request, $id)
    {
        $params = $request->json()->all();
        return $this->groupsService->update($id, $params);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param  int $id
     * @return mixed
     */
    public function destroy(Request $request, $id)
    {
        $params = $request->json()->all();
        $this->groupsService->delete($id, $params);
    }


}