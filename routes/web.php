<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LoginRegisterController;
use App\Http\Controllers\MainAppController;
use App\Http\Controllers\AppLinkController;
use App\Http\Controllers\ActivityLogController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['middleware' => 'guest'], function () {
    // Register
    Route::get('/register', [LoginRegisterController::class, 'register_index'])->name('register');
    Route::post('/register', [LoginRegisterController::class, 'register'])->name('register.submit');

    // Login
    Route::get('/login', [LoginRegisterController::class, 'index'])->name('auth');
    Route::post('/login', [LoginRegisterController::class, 'login'])->name('login');
});

Route::group(['middleware' => 'auth'], function () {

    // Verify Process
    Route::get('/otp-verify', [LoginRegisterController::class, 'otp_verify'])->name('otp-verify');
    Route::post('/otp-verify', [LoginRegisterController::class, 'verifyOtp'])->name('otp-verify-process');

    // Logout
    Route::post('/logout', [LoginRegisterController::class, 'logout'])->name('logout');

    // Dashboard
    Route::get('/main-app', [MainAppController::class, 'index'])->name('main-app');

    // App Module
    Route::get('/app-index', [AppLinkController::class, 'index'])->name('app-index');
    Route::post('/app-store', [AppLinkController::class, 'store'])->name('app-store');
    Route::put('/app-update/{id}', [AppLinkController::class, 'update'])->name('app-update');
    Route::delete('/app-delete/{id}', [AppLinkController::class, 'destroy'])->name('app-delete');

    // Log Activiy Module
    Route::get('/log-index', [ActivityLogController::class, 'index'])->name('log-index');
});

Route::get('/forgot-password', [LoginRegisterController::class, 'forgot_password'])->name('forgot-password');
