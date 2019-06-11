<?php
/**
 * Created by PhpStorm.
 * User: dexterionut
 * Date: 30/07/2017
 * Time: 21:19
 */

namespace App\Modules\Users\Services;


use App\Modules\Users\Models\User;
use App\Modules\Users\Traits\UserModelTrait;

/**
 * Class UsersService
 * @package App\Modules\Users\Services
 */
class UsersService
{

    use UserModelTrait;

    const PER_PAGE = 50;
    /**
     * @var User
     */
    protected $model;

    /**
     * UsersService constructor.
     * @param $model
     */
    public function __construct(User $model)
    {
        $this->model = $model;
    }


    /**
     * Create item based on parameters
     *
     * @param $params
     * @return $this|\Illuminate\Database\Eloquent\Model
     */
    public function create($params)
    {
        $this->isAdmin()->doAbort();

        if (!isset($params['password']))
            $params['password'] = bcrypt('password');
        else
            $params['password'] = bcrypt($params['password']);

        $item = $this->model->create($params);
        return $item;
    }

    /**
     * Get all items paginated
     *
     * @param $params
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAllPaginated($params)
    {
//        return $params;
        $perPage = isset($params['per_page']) ? $params['per_page'] : self::PER_PAGE;
        $query = $this->model->with( 'groups')->whereNotNull('id');

//        if ($this->isAdmin()->getAbortFlag()) {
//            $query = $query
//                ->where('type', '!=', 'ADMIN');
//        }


        $this->attachFilters($params, $query);

        return $query->paginate($perPage);
    }

    protected function attachFilters(array $rawFilters, $query)
    {
        if (isset($rawFilters['q'])) {
            $word = $rawFilters['q'];
            $query->where(function ($q) use ($word) {
                $q->where('name', 'like', '%' . $word . '%')
                    ->orWhere('email', 'like', '%' . $word . '%');
            });
        }
        if (isset($rawFilters['city_id'])) {
            $query->where('city_id', $rawFilters['city_id']);
        }

    }

    /**
     * Get one item
     *
     * @param $id
     * @param $params
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null|static|static[]
     */
    public function getOne($id, $params = NULL)
    {
        $user = $this->model->with( 'groups')->find($id);
        $this->isAdmin()->isSameAsLogged($id)->doAbort();

        return $user;
    }

    /**
     * Update item
     *
     * @param $id
     * @param $params
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null|static|static[]
     */
    public function update($id, $params)
    {

        $item = $this->model
            ->find($id);
        if (!$item) {
            abort(404, "Can't find the specified resource!");
        }

        if (isset($params['password']))
            $params['password'] = bcrypt($params['password']);



        $this->isAdmin()->isSameAsLogged($id)->doAbort();

        $item->update($params);
        return $item;
    }


    /**
     * Delete item
     *
     * @param $id
     * @param $params
     * @return string
     */
    public function delete($id, $params = NULL)
    {

        $item = $this->model->find($id);
        if (!$item) {
            abort(404, "Can't find the specified resource!");
        }

        $this->isAdmin()->isSameAsLogged($id)->doAbort();

        $item->delete();

        return "Resource deleted!";
    }

    public function register($params)
    {
        $validator = $this->model::validate($params);
        if (!$validator->passes()) {
            return response([
                'message' => 'Validation not passed',
                'errors' => $validator->errors()
            ], 400);
        }

        $params['password'] = bcrypt($params['password']);


        $user = $this->model->create($params);

        return $user;
    }

}