<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::view('/about-us','about')->name('about');

Route::get('/signup', [SignupController::class, 'create']);

Route::get('/login', [LoginController::class, 'create']);
