<?php
/**
 * Created by PhpStorm.
 * User: dexterionut
 * Date: 26/07/2017
 * Time: 14:35
 */


Route::group([
    'middleware' => 'auth-optionally'
], function () {



});
Route::group([
    'middleware' => 'auth'
], function () {


//    Route::resources([
//
//    ]);

});
