<?php

namespace App\Modules\Files\Controllers;

use App\Http\Controllers\Controller;

use App\Modules\Claims\Models\ExternalFile;
use App\Modules\Files\Models\File;
use App\Modules\Files\Services\FilesService;
use App\Modules\Users\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File as LaravelFile;
use Illuminate\Support\Facades\Response;
use Ixudra\Curl\Facades\Curl;

/**
 * Class FilesController
 * @package App\Http\Controllers
 */
class FilesController extends Controller
{

    /**
     * @var FilesService
     */
    protected $filesService;

    /**
     * FilesController constructor.
     * @param $filesService
     */
    public function __construct(FilesService $filesService)
    {
        $this->filesService = $filesService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return mixed
     */


    public function index(Request $request)
    {
        $queryParams = $request->all();

        $items = $this->filesService->getAllPaginated($queryParams);

        return $items;
    }

    /**
     * Serve for download the specified resource.
     *
     * @param Request $request
     * @param  int $id
     * @return Response
     */
    public function serve(Request $request, $id)
    {
        $queryParams = $request->all();
        return $this->filesService->serve($id, $queryParams);
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
        $queryParams = $request->json()->all();
        return $this->filesService->update($id, $queryParams);
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
        return $this->filesService->getOne($id);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        if ($request->hasFile('file')) {
            $filePath = str_random(64) . '.' . $request->file('file')->getClientOriginalExtension();
            $request->file('file')->move(storage_path('app/files/'), $filePath);
            $file = File::create([
                'name' => $request->file('file')->getClientOriginalName(),
                'path' => $filePath,
                'extension' => $request->file('file')->getClientOriginalExtension(),
                'reference' => 'U-' . FilesService::getUploadNumber(),
                'barcode' => FilesService::getBarcodeNumber(),
                'checksum' => md5_file(storage_path('app/files/' . $filePath)),
                'user_id' => isset($request->user->id) ? $request->user->id : null
            ]);

            //TODO fix the jar and uncomment this then return it
//            $signedFile = Signer::signFile($file, $file->reference);

            return $file;
        } else {
            return "NO FILE";
        }


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
        return $this->filesService->delete($id);
    }
}
