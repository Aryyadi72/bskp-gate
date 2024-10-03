<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LoginRegisterController;
use App\Http\Controllers\MainAppController;
use App\Http\Controllers\AppLinkController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/landing-gate', [LandingController::class, 'index'])->name('landing');

Route::get('/', [LoginRegisterController::class, 'index'])->name('auth');
Route::get('/register', [LoginRegisterController::class, 'register_index'])->name('register');
Route::get('/forgot-password', [LoginRegisterController::class, 'forgot_password'])->name('forgot-password');

Route::post('/register', [LoginRegisterController::class, 'register'])->name('register.submit');

Route::get('/main-app', [MainAppController::class, 'index'])->name('main-app');

Route::get('/app-index', [AppLinkController::class, 'index'])->name('app-index');
Route::post('/app-store', [AppLinkController::class, 'store'])->name('app-store');
Route::put('/app-update/{id}', [AppLinkController::class, 'update'])->name('app-update');
Route::delete('/app-delete/{id}', [AppLinkController::class, 'destroy'])->name('app-delete');
