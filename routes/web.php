<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware('guest')->group(function(){
    Route::get('login', [LoginController::class, 'show']);
    Route::post('login', [LoginController::class, 'login'])->name('login');
    Route::get('register', [RegisterController::class, 'show']);
    Route::post('register', [RegisterController::class, 'register'])->name('register');
});

Route::middleware('auth')->group(function(){
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/jobs/{job_id}/apply', [JobController::class, 'applicationForm'])->name('jobs.applicationForm');
    Route::post('/jobs/{job_id}/apply', [JobController::class, 'apply'])->name('jobs.apply');

    Route::middleware('admin')->group(function(){
        Route::get('jobs/create', [JobController::class, 'create'])->name('jobs.create');
        Route::post('jobs/create', [JobController::class, 'store'])->name('jobs.store');
    });
});

Route::get('/jobs', [JobController::class, 'index']);
Route::get('/jobs/{job_id}', [JobController::class, 'show'])->name('jobs.show');
