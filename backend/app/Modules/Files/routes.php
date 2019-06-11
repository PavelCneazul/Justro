<?php
/**
 * Created by PhpStorm.
 * User: dexterionut
 * Date: 07/09/2017
 * Time: 14:12
 */



Route::group([
    'middleware' => 'auth'
], function () {

    Route::get('files/{id}/download', 'FilesController@serve');


    Route::resources([
        'files' => 'FilesController',
    ]);

});



