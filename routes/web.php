<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;







Route::view('/login', 'auth.login')->name('login');
Route::post('/login', [AuthController::class, 'login']);


Route::view('/register', 'auth.register')->name('register');
Route::post('/register', [AuthController::class, 'register']);


Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [PostController::class, 'index'])->name('/');


    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::post('/edit_profile', [UserController::class, 'edit_profile'])->name('edit_profile');

    Route::get('/new_post', [PostController::class, 'new_post'])->name('new_post');
    Route::post('/create_post',[PostController::class,'create_post']);

    

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
