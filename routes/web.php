<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

// public
Route::get('/', 'HomeController@index');
Route::get('/login', function () {
    return view('auth.login2');
});

Route::get('/post_item', 'ItemsController@createByUser');
Route::post('/post_item', 'ItemsController@storeByUser');

Route::get('/view/item/{id}', 'ItemsController@show');

// Auth
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index');

    //Profiles
    Route::get('/profile/{id}', 'UsersController@show');
    Route::post('/profile/{id}', 'UsersController@update');
    //Route::delete('/profile/{id}', 'UsersController@destroy');

    // Items
    Route::get('/my/items/', 'ItemsController@indexForUser');
    Route::post('/my/item/create', 'ItemsController@store');
    Route::post('/my/item/{id}', 'ItemsController@update');
    Route::delete('/my/item/{id}', 'ItemsController@destroy');

//    Route::resource('items', 'ItemsController');
//    Route::resource('states', 'StatesController');
//    Route::resource('countries', 'CountriesController');
//    Route::resource('item_categories', 'ItemCategoriesController');
//    Route::resource('roles', 'RolesController');
//    Route::resource('types', 'TypesController');
//    Route::resource('states', 'StatesController');
});