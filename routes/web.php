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
    Route::get('/users/profiles/{user_slug}', 'HomeController@profiles')->name('user_profile');
    Route::get('/users/profiles/{user_slug}/edit', 'HomeController@profiles_edit')->name('user_profile_edit');
    Route::get('/users/add', 'HomeController@add')->name('user_add');
    Route::get('/users/activities-log/{user_slug}', 'HomeController@activities')->name('user_activities_log');
    Route::get('/users/manage-role', 'HomeController@manage_role')->name('manage_role');
    Route::get('/users/manage-role/add-role', 'HomeController@add_role')->name('add_role');

    Route::get('/pages', 'HomeController@pages')->name('page');
    Route::get('/pages/add-page', 'HomeController@add_page')->name('add_page');

    Route::get('/photos', 'HomeController@photos')->name('photo');
    Route::get('/photos/albums/{album_slug}', 'HomeController@albums')->name('album');

});

Route::prefix('api')->group(function () {
    Route::get('users', 'UserController@index');
    Route::get('users/{user_slug}', 'UserController@show');
    Route::post('users', 'UserController@store');
    Route::put('users/{user_slug}', 'UserController@update')->name('api_user_update');
    Route::delete('users/{user_slug}', 'UserController@delete');

    Route::get('permissions', 'PermissionController@index');

    Route::get('roles', 'RoleController@index');

    Route::get('albums', 'AlbumController@index');
    Route::get('albums/{album_id}', 'AlbumController@show');
    Route::post('albums', 'AlbumController@store');
    Route::put('albums/{album_id}', 'AlbumController@update')->name('api_album_update');
    Route::delete('albums/{album_id}', 'AlbumController@destroy');

    Route::get('photos', 'PhotoController@index');
    Route::post('photos', 'PhotoController@store');
    Route::put('photos/{photo_id}', 'PhotoController@update')->name('api_photo_update');
    Route::delete('photos/{photo_id}', 'PhotoController@destroy');

    Route::get('categories', 'CategoryController@index');

    Route::get('tags', 'TagController@index');

});
