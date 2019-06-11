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


    Route::get('users/{id}/get_avatar', 'UsersController@getAvatar');
    Route::get('users/{id}', 'UsersController@getOneUser');
    Route::resources([
        'users' => 'UsersController'

    ]);


});


Route::group([
    'middleware' => 'auth'
], function () {
    Route::get('auth/me', 'AuthenticationController@getMe');
    Route::post('users/{id}/post_avatar', 'UsersController@postAvatar');


    Route::resources([
        'groups' => 'GroupsController'

    ]);

});

Route::post('auth/login', 'AuthenticationController@signIn');
Route::post('auth/signup', 'UsersController@singUp');
Route::any('auth/logout', 'AuthenticationController@signOut');