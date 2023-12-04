<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;







Route::view('/login', 'auth.login')->name('login');
Route::post('/login', [AuthController::class, 'login']);


Route::view('/register', 'auth.register')->name('register');
Route::post('/register', [AuthController::class, 'register']);


Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [PostController::class, 'index'])->name('/');

    Route::get('/review/{email}', [UserController::class, 'review'])->name('user-profile');

    Route::get('/profile', [UserController::class, 'profile'])->name('profile');

    Route::post('/edit_profile', [UserController::class, 'edit_profile'])->name('edit_profile');

    Route::get('/new_post', [PostController::class, 'new_post'])->name('new_post');

    Route::post('/create_post', [PostController::class, 'create_post']);

    Route::get('/my_post', [PostController::class, 'my_post'])->name('my_post');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/post/{id}', [PostController::class, 'post'])->name('post');

    Route::post('/save_comment/{id}', [PostController::class, 'save_comment'])->name('save_comment');

    Route::post('/like-post', [PostController::class, 'do_like'])->name('do_like');

    Route::post('/filter_user', [UserController::class, 'filter_user'])->name('filter_user');

    Route::get('/delete_comment/{id}', [PostController::class, 'delete_comment'])->name('delete_comment');

    Route::get('/edit_post/{id}', [PostController::class, 'edit_post'])->name('edit_post');

    Route::post('/save_edit_post/{id}', [PostController::class, 'save_edit_post'])->name('save_edit_post');

    Route::get('/delete_post/{id}', [PostController::class, 'delete_post'])->name('delete_post');

    Route::get('/follow/{id}', [PostController::class, 'follow'])->name('follow');

    Route::post('/follow_user', [FollowerController::class, 'follow'])->name('follow');

    Route::get('/chat', [ChatController::class, 'index'])->name('chat');

    Route::get('/chat/{id}', [ChatController::class, 'chat_messages'])->name('chat_messages');

    Route::post('/chat/{id}/send_message',[ChatController::class,'send_message'])->name('send_message');

    Route::post('/chat/{id}/message',[ChatController::class,'message'])->name('message');
});




