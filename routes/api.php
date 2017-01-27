<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/items-all', function () {
    $Items = \App\Models\Items::paginate(2);
    return $Items;
})->middleware('CORS');

Route::get('/api', function () {
    return 'GET';
})->middleware(['CORS','CheckApi']);

Route::post('authenticate', 'AuthenticateController@authenticate');
Route::get('authenticate', 'AuthenticateController@getAuthenticatedUser');

//Profiles
//Route::get('/profile/{id}', 'UsersController@show');
//Route::post('/profile/{id}', 'UsersController@update');
//Route::delete('/profile/{id}', 'UsersController@destroy');

// Items
//Route::get('/my/items/', 'ItemsController@indexForUser');
//Route::post('/my/item/create', 'ItemsController@store');
//Route::post('/my/item/{id}', 'ItemsController@update');
//Route::delete('/my/item/{id}', 'ItemsController@destroy');