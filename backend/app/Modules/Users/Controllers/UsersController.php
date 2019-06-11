<?php
/**
 * Created by PhpStorm.
 * User: dexterionut
 * Date: 14/08/2017
 * Time: 02:20
 */

namespace App\Modules\Users\Controllers;


use App\Models\Recipe;
use App\Models\Tonometer;
use App\Models\UserFriend;
use App\Models\WeightHistory;
use App\Modules\Users\Models\User;
use App\Modules\Users\Services\UsersService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class UsersController
{
    protected $usersService;

    /**
     * UsersController constructor.
     * @param $usersService
     */
    public function __construct(UsersService $usersService)
    {
        $this->usersService = $usersService;
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
        return $this->usersService->getAllPaginated($params);
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
        return $this->usersService->getOne($id, $params);
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
        return $this->usersService->create($params);
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
        return $this->usersService->update($id, $params);
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
        return $this->usersService->delete($id, $params);
    }

    public function getAvatar(Request $request, $id)
    {
        $user = User::where("id", '=', $id)->first();
        if (!$user) abort(404);
        if (!$user->avatar) abort(404);

        $path = storage_path() . '/app/avatars/' . $user->avatar;
        $img = Image::make($path);

        return $img->response('png');
    }

    public function postAvatar(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user) abort(404);

        if ($user->id != $request->user->id) {
            abort(403);
        }

        if ($request->hasFile('avatar')) {
            $coverFile = $id . '.' . $request->file('avatar')->getClientOriginalExtension();
            $request->file('avatar')->move(storage_path('app/avatars/'), $coverFile);

            $img = Image::make(storage_path('app/avatars/') . $coverFile);

            $img->resize(128, 128);
            $img->save();

            $user->avatar = $coverFile;

            $user->save();
        }

        return $user;
    }


    public function singUp(Request $request)
    {
        $params = $request->json()->all();

        $user = $this->usersService->register($params);


        return $user;

    }

    public function loginWithFacebook(Request $request)
    {
        $data = $request->json()->all();
//        return $data;


        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt('password'),
            'isUser' => true
        ]);

        return $user;

    }

    public function getOneUser($id)
    {
        $item = User::with('groups')
            ->find($id);

        return $item;
    }
}