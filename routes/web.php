<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/jobs', [JobController::class, 'index']);

Route::middleware('guest')->group(function(){
    Route::get('login', [LoginController::class, 'show']);
    Route::post('login', [LoginController::class, 'login'])->name('login');
    Route::get('register', [RegisterController::class, 'show']);
    Route::post('register', [RegisterController::class, 'register'])->name('register');
});

Route::middleware('auth')->group(function(){
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
});
