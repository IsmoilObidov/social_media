<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;







Route::view('/login', 'auth.login')->name('login');
Route::post('/login', [AuthController::class, 'login']);


Route::view('/register', 'auth.register')->name('register');
Route::post('/register', [AuthController::class, 'register']);


Route::group(['middleware' => 'auth'], function () {

    Route::get('/', function () {
        return view('welcome');
    })->name('/');


    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
