<?php
use Illuminate\Support\Facades\Mail;

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

// GET
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/login', function () {
    return view('auth.login2');
});
// POST
//Route::post('/login', 'Auth\LoginController@login');
//Route::post('/register', 'Auth\LoginController@login');

// Auth
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index');
    //Route::get('/profile', 'HomeController@index');
    Route::resource('items', 'ItemsController');
    Route::resource('states', 'StatesController');
    Route::resource('countries', 'CountriesController');
    Route::resource('item_categories', 'ItemCategoriesController');
    Route::resource('roles', 'RolesController');
    Route::resource('users', 'UsersController');
    Route::resource('types', 'TypesController');
    Route::resource('states', 'StatesController');
});