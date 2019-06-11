<?php
/**
 * Created by PhpStorm.
 * User: dexterionut
 * Date: 30/07/2017
 * Time: 21:19
 */

namespace App\Modules\Files\Services;

use App\Modules\Files\Models\File;
use App\Modules\Files\Models\Tag;
use App\Modules\Users\Models\User;
use App\Modules\Users\Traits\UserModelTrait;
use Illuminate\Support\Facades\Response;

/**
 * Class FilesService
 * @package App\Modules\Users\Services
 */
class FilesService
{

    use UserModelTrait;

    /**
     * Default per page number
     */
    const PER_PAGE = 50;
    /**
     * @var File
     */
    protected $model;

    /**
     * UsersService constructor.
     * @param $model
     */
    public function __construct(File $model)
    {
        $this->model = $model;
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

    /**
     * @param array $rawFilters
     * @param $query
     */
    protected function attachFilters(array $rawFilters, $query)
    {
        $rawFilters = array_filter($rawFilters);


//        if (isset($rawFilters['q'])) {
//            $word = $rawFilters['q'];
//            $query->where(function ($q) use ($word) {
//
//            });
//        }

        //TODO complete this
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
        $file = $this->model->findOrFail($id);

        return $file;
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
        $file = $this->model
            ->findOrFail($id);

        $file->update($params);

        return $file;
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

        $file = $this->model
            ->findOrFail($id);

        $this->isAdmin()->doAbort();


        $file->delete();

        return response(['message' => 'OK'], 200);
    }

    /**
     * Return the file from the disk
     *
     * @param $id
     * @param $params
     * @return Response
     */
    public function serve($id, $params)
    {
        $file = $this->model->findOrFail($id);
        $filename = $file->path;
        $path = storage_path('app/files/') . $filename;
        $type = $file->extension;
        if (isset($params['preview']) && $params['preview'] == true) {

            if (strtolower($file->extension) == 'pdf') {
                $type = 'application/pdf';
            }
            return response()->make(file_get_contents($path), 200, [
                'Content-Type' => $type,
                'Content-Disposition' => 'inline; filename="' . $filename . '.' . $type . '"'
            ]);
        } else {
            return response()->download($path);
        }
    }

    /**
     * Return the next upload number for creating the reference
     *
     * Used for files uploaded from pc
     *
     * @return int
     */
    public static function getUploadNumber()
    {
        $files = File::where('reference', 'LIKE', 'U%')->orderBy('id', 'ASC')->get();
        $nextNumber = $files
            ->map(function ($file, $key) {
                return intval(preg_replace('/[^0-9]+/', '', $file->reference), 10);
            })
            ->max();
        return $nextNumber > 0 ? $nextNumber + 1 : 1;
    }

    /**
     * Return the next barcode
     *
     * @return int|mixed
     */
    public static function getBarcodeNumber()
    {
        $fileWithMaxBarcode = File::whereNotNull('id')
            ->orderBy('barcode', 'DESC')
            ->first();
        if (!$fileWithMaxBarcode || $fileWithMaxBarcode->barcode < 10000001) {
            return 10000001;
        } else {
            return $fileWithMaxBarcode->barcode + 1;
        }
    }

}