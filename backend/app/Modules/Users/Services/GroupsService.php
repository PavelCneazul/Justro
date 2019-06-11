<?php
/**
 * Created by PhpStorm.
 * User: dexterionut
 * Date: 30/07/2017
 * Time: 21:19
 */

namespace App\Modules\Users\Services;

use App\Modules\Users\Models\Group;
use App\Modules\Users\Traits\UserModelTrait;

/**
 * Class GroupsService
 * @package App\Modules\Users\Services
 */
class GroupsService
{
    use UserModelTrait;

    const PER_PAGE = 50;

    /**
     * @var Group
     */
    protected $model;

    /**
     * GroupsService constructor.
     * @param $model
     */
    public function __construct(Group $model)
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

        $item = $this->model->create($params);
        return $item;
    }

    /**
     * Get all items
     *
     * @param $params
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll($params)
    {
        return $this->model->all();
    }

    /**
     * Get all items paginated
     *
     * @param $params
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */

    public function getAllPaginated($params)
    {
        $perPage = isset($params['per_page']) ? $params['per_page'] : self::PER_PAGE;
        $query = $this->model->whereNotNull('id');

        $this->attachFilters($params, $query);

        return $query->paginate($perPage);
    }

    protected function attachFilters(array $rawFilters, $query)
    {
        $rawFilters = array_filter($rawFilters);


        if (isset($rawFilters['q'])) {
            $word = $rawFilters['q'];
            $query->where(function ($q) use ($word) {
                $q->where('name', 'like', '%' . $word . '%')
                    ->orWhere('code', 'like', '%' . $word . '%');
            });
        }

        //TODO complete this
    }

    /**
     * Get one item
     *
     * @param $id
     * @param $params
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null|static|static[]
     */
    public function getOne($id, $params)
    {
        $this->isAdmin()->doAbort();

        return $this->model->find($id);
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
        $this->isAdmin()->doAbort();

        $item = $this->model
            ->find($id);
        if (!$item) {
            abort(404, "Can't find the specified user!");
        }
        $item->update($params);
        return $item;
    }

    /**
     * Delete item
     *
     * @param $id
     * @param $params
     */
    public function delete($id, $params)
    {
        $this->isAdmin()->doAbort();

        $item = $this->model->find($id);
        if (!$item) {
            abort(404, "Can't find the specified resource!");
        }
        $item->delete();
    }

}