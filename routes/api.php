<?php

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|s
*/
Route::group(['middleware' => 'CORS'], function () {

    Route::post('authenticate', 'AuthenticateController@authenticate');
    Route::get('authenticate', 'AuthenticateController@getAuthenticatedUser')->middleware(['jwt.auth']);
    Route::get('renewToken', 'AuthenticateController@renewToken');

    Route::get('/items-all', function () {
        return  \App\Models\Items::paginate(6);
    });

    Route::get('items', 'ItemsAPIController@index');
    Route::get('items/{id}', 'ItemsAPIController@show');

    Route::group(['middleware' => 'jwt.auth'], function () {
        Route::get('users/{id}', 'UsersAPIController@show');
        Route::post('users', 'UsersAPIController@store');
        Route::put('users/{id}', 'UsersAPIController@update');
        Route::delete('users/{id}', 'UsersAPIController@destroy');

        Route::post('items', 'ItemsAPIController@store');
        Route::put('items/{id}', 'ItemsAPIController@update');
        Route::delete('items/{id}', 'ItemsAPIController@destroy');
    });
});

