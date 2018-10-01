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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::name('admin.')->group(function () {
    Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
    
    Route::get('/users', 'HomeController@users')->name('user');
    Route::get('/users/profiles', 'HomeController@profiles')->name('user_profile');
    Route::get('/users/add', 'HomeController@add')->name('user_add');
    Route::get('/users/activities-log', 'HomeController@activities')->name('user_activities_log');
    Route::get('/users/manage-role', 'HomeController@manage_role')->name('manage_role');
    Route::get('/users/manage-role/add-role', 'HomeController@add_role')->name('add_role');

    Route::get('/pages', 'HomeController@pages')->name('page');
    Route::get('/pages/add-page', 'HomeController@add_page')->name('add_page');

    Route::get('/photos', 'HomeController@photos')->name('photo');
    Route::get('/photos/albums', 'HomeController@albums')->name('album');

});

Route::prefix('api')->group(function () {
    Route::get('users', 'UserController@index');
    Route::get('users/{user}', 'UserController@show');
    Route::post('users', 'UserController@store');
    Route::put('users/{user}', 'UserController@update');
    Route::delete('users/{user}', 'UserController@delete');
});
