<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\PostController;


Auth::routes();
Route::get('/', function () {
    return view('welcome');
});

Route::get('/','HomeController@index')->name('home');

Route::get('/post/{post}','PostController@show')->name('post');
Route::middleware('auth')->group(function(){

    Route::get('/admin','AdminsController@index')->name('admin.index');
    Route::get('/admin/posts/create','PostController@create')->name('post.create');
    Route::get('/admin/posts','PostController@index')->name('post.index');
    Route::post('/admin/posts','PostController@store')->name('post.store');
    Route::get('/admin/posts/your_post','PostController@view_all_post')->name('user.posts');
    Route::get('/admin/posts/view_all_post','PostController@view_all_users_post')->name('user_all.posts');
    Route::get('/update_post/{post}','PostController@update_post')->name('update.posts');
    Route::put('/update/{post}','PostController@update')->name('updated.posts');
    Route::get('/delete_post/{post}','PostController@delete')->name('delete.posts');
    Route::post('/comment_post/{post}','CommentController@store')->name('comment.store');
    Route::get('/like/{post}','LikeController@liked_post')->name('post.like');
    Route::get('/unlike/{post}','LikeController@unliked_post')->name('post.unlike');
    Route::resource('category', CategoryController::class);
    Route::resource('role', RoleController::class);
    Route::get('/user_role_manage', 'RoleController@users_role_manage')->name('role.manage');
    Route::get('/add_user_role/{user}', 'RoleController@add_users_role')->name('role.add');
    Route::post('/user_role_created/{user}', 'RoleController@user_role_created')->name('role.created');
    Route::get('/delete_user_role/{user}', 'RoleController@delete_users_role')->name('role.delete');
    Route::post('/user_role_deleted/{user}', 'RoleController@user_role_deleted')->name('role.deleted');

});
Route::post('/search','PostController@search')->name('search_post');
// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

