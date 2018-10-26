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

// RAIZ / CAFES
Route::get('/', 'CaffeController@index')->name('caffes.index');
Route::get('/caffes/staff/{caffe}', 'CaffeController@staff');
Route::get('/caffes/{caffe}/follow', 'CaffeController@follow')->name('caffes.follow');
Route::get('/caffes/{caffe}/unfollow', 'CaffeController@unfollow')->name('caffes.unfollow');
Route::post('/caffes/staff/hire', 'CaffeController@staffadd');
Route::post('/caffes/staff/remove', 'CaffeController@staffremove');
Route::post('/caffes/{caffe}/lock', 'CaffeController@lock')->name('caffes.lock');
Route::resource('/caffes','CaffeController');

// SEARCH
Route::get('/search', 'SearchController@index')->name('search.index');

// POSTS
Route::post('/posts/store', 'PostController@store');
Route::get('/posts/{post}/status', 'PostController@status')->name('posts.status');
Route::get('/posts/{post}/tip', 'PostController@tip')->name('posts.tip');
Route::get('/posts/{post}/untip', 'PostController@untip')->name('posts.untip');

//REPOSTS 
Route::get('/repost/{cafee_id}/{post_id}/{repost_id}/{repost_user}', 'RepostController@create')->name('repost.create');;

// USER / FEED
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users/{user}/edit', 'UserController@edit')->name('users.edit');
Route::put('/users/{user}', 'UserController@update')->name('users.update');
Route::get('/users/{user}', 'UserController@show')->name('users.show');
Route::get('/users/{user}/destroy', 'UserController@destroy')->name('users.destroy');
Route::get('/users/{user}/promote', 'UserController@promote')->name('users.promote');

// TAGS
Route::get('/tags/{tag}', 'TagController@show')->name('tags.show');

// COMMENTS
Route::post('/comment/store', 'CommentController@store');

//ABOUT US AND CONTACTS
Route::get('/about_us', 'ContactController@aboutus')->name('about');
Route::get('/contacts', 'ContactController@contacts');
Route::post('/thanks', 'ContactController@thanks');
Route::get('/feedbacks', 'ContactController@feedbacks');

// TESTES
Route::get('/teste', 'HomeController@teste')->name('teste');