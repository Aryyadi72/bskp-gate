<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LoginRegisterController;
use App\Http\Controllers\MainAppController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/landing-gate', [LandingController::class, 'index'])->name('landing');

Route::get('/auth', [LoginRegisterController::class, 'index'])->name('auth');
Route::post('/register', [LoginRegisterController::class, 'register'])->name('register.submit');

Route::get('/main-app', [MainAppController::class, 'index'])->name('main-app');
