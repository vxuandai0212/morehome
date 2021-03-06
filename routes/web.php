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
Route::get('/', 'PageController@home')->name('home');

Route::get('/about', 'PageController@about')->name('about');

Route::get('/contact', 'PageController@contact')->name('contact');

//Term and Policy
Route::get('/policy', 'PageController@policy')->name('policy');

//Services
Route::get('/services', 'PageController@services')->name('services');

Route::get('/services/{service_category_slug}', 'PageController@service')->name('service')->middleware('post_view');

//Projects
Route::get('/projects', 'PageController@projects')->name('projects');

Route::get('/projects/{project_slug}', 'PageController@project')->name('project')->middleware('post_view');

//Advice
Route::get('/ideabooks', 'PageController@ideabooks')->name('advices');

Route::get('/ideabooks/{ideabook_slug}', 'PageController@ideabook')->name('advice')->middleware('post_view');

//Personal Page
Route::get('/personal/{username}', 'UserController@personal')->middleware('auth');
Route::get('/personal/{username}/profile', 'UserController@profile')->middleware('auth');

//Send mail
Route::post('/message/send', 'MailController@guest_mail');
Route::get('/subcribe', 'MailController@subcribe');

Auth::routes();

Route::name('admin.')->group(function () {
    Route::group(['middleware' => ['check_admin']], function () {
        Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
        
        Route::group(['middleware' => ['check_superadmin']], function () {
            Route::get('/users', 'HomeController@users')->name('user');
            Route::get('/users/profiles/{user_slug}', 'HomeController@profiles')->name('user_profile');
            Route::get('/users/profiles/{user_slug}/edit', 'HomeController@profiles_edit')->name('user_profile_edit');
            Route::get('/users/add', 'HomeController@add')->name('user_add');
            Route::get('/users/activities-log/{user_slug}', 'HomeController@activities')->name('user_activities_log');
        });

        Route::get('/posts', 'HomeController@posts')->name('post');
        Route::get('/posts/add', 'HomeController@add_post')->name('add_post');
        Route::get('/posts/edit/{post_slug}', 'HomeController@edit_post')->name('edit_post');

        Route::get('/photos', 'HomeController@photos')->name('photo');
        Route::get('/photos/albums/{album_slug}', 'HomeController@albums')->name('album');
    });
});

Route::prefix('api')->group(function () {
    Route::get('users', 'UserController@index');
    Route::get('users/{user_id}', 'UserController@show');
    Route::post('users', 'UserController@store')->middleware('check_superadmin');
    Route::put('users/{user_slug}', 'UserController@update')->middleware('check_superadmin')->name('api_user_update');
    Route::delete('users/{user_slug}', 'UserController@delete')->middleware('check_superadmin');

    Route::get('roles', 'RoleController@index');

    Route::get('posts', 'PostController@index');
    Route::get('posts/get-random', 'PostController@get_random');
    Route::get('posts/search', 'PostController@search');
    Route::get('posts/{post_id}', 'PostController@show');
    Route::get('posts/{post_id}/name', 'PostController@get_name');
    Route::post('posts', 'PostController@store')->middleware('check_admin');
    Route::put('posts/{post_id}', 'PostController@update')->name('api_post_update')->middleware('check_admin');
    Route::delete('posts/{post_id}', 'PostController@destroy')->middleware('check_admin');

    Route::get('albums', 'AlbumController@index');
    Route::get('albums/{album_id}', 'AlbumController@show');
    Route::post('albums', 'AlbumController@store')->middleware('check_admin');
    Route::put('albums/{album_id}', 'AlbumController@update')->middleware('check_admin')->name('api_album_update');
    Route::delete('albums/{album_id}', 'AlbumController@destroy')->middleware('check_admin');

    Route::get('photos', 'PhotoController@index');
    Route::get('photos/project', 'PhotoController@photo_in_project');
    Route::post('photos', 'PhotoController@store')->middleware('check_admin');
    Route::put('photos/{photo_id}', 'PhotoController@update')->middleware('check_admin')->name('api_photo_update');
    Route::delete('photos/{photo_id}', 'PhotoController@destroy')->middleware('check_admin');

    Route::get('categories', 'CategoryController@index');

    Route::get('tags', 'TagController@index');

    // comment and reply
    Route::post('comments', 'CommentController@comments')->middleware('comment_count');
    Route::get('comments/post', 'CommentController@get_comment_in_post');
    Route::get('comments/replies', 'CommentController@get_reply_in_comment');

    // like
    Route::post('likes', 'UserActivityController@likes');
    Route::put('likes/{like_id}', 'UserActivityController@unlikes');

    // bookmark
    Route::post('bookmarks', 'UserActivityController@bookmarks');
    Route::put('bookmarks/{bookmark_id}', 'UserActivityController@unbookmarks');

    // rate
    Route::post('rates', 'UserActivityController@rates');
    Route::put('rates/{rate_id}', 'UserActivityController@update_rate');

});
