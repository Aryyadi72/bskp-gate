<?php

use App\Http\Controllers\RoleAppController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LoginRegisterController;
use App\Http\Controllers\MainAppController;
use App\Http\Controllers\AppLinkController;
use App\Http\Controllers\ActivityLogController;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'guest'], function () {
    // Register
    Route::get('/register', [LoginRegisterController::class, 'register_index'])->name('register');
    Route::post('/register', [LoginRegisterController::class, 'register'])->name('register.submit');

    // Login
    Route::get('/login', [LoginRegisterController::class, 'index'])->name('auth');
    Route::post('/login', [LoginRegisterController::class, 'login'])->name('login');
});

Route::group(['middleware' => ['jwt.auth']], function() {
    // Rute yang dilindungi oleh token JWT
    Route::get('/main-app', [MainAppController::class, 'index'])->name('main-app');

    Route::get('/app-index', [AppLinkController::class, 'index'])->name('app-index');
    Route::post('/app-store', [AppLinkController::class, 'store'])->name('app-store');
    Route::put('/app-update/{id}', [AppLinkController::class, 'update'])->name('app-update');
    Route::delete('/app-delete/{id}', [AppLinkController::class, 'destroy'])->name('app-delete');

    Route::get('/role-app-index', [RoleAppController::class, 'index'])->name('role-app-index');
    Route::post('/role-app-store', [RoleAppController::class, 'store'])->name('role-app-store');
    Route::put('/role-app-update/{id}', [RoleAppController::class, 'update'])->name('role-app-update');
    Route::delete('/role-app-delete/{id}', [RoleAppController::class, 'destroy'])->name('role-app-delete');
});

Route::group(['middleware' => 'auth'], function () {

    // Verify Process
    Route::get('/otp-verify', [LoginRegisterController::class, 'otp_verify'])->name('otp-verify');
    Route::post('/otp-verify', [LoginRegisterController::class, 'verifyOtp'])->name('otp-verify-process');

    // Logout
    Route::post('/logout', [LoginRegisterController::class, 'logout'])->name('logout');

    // Dashboard
    // Route::get('/main-app', [MainAppController::class, 'index'])->name('main-app');

    // App Module
    // Route::get('/app-index', [AppLinkController::class, 'index'])->name('app-index');
    // Route::post('/app-store', [AppLinkController::class, 'store'])->name('app-store');
    // Route::put('/app-update/{id}', [AppLinkController::class, 'update'])->name('app-update');
    // Route::delete('/app-delete/{id}', [AppLinkController::class, 'destroy'])->name('app-delete');

    // Log Activiy Module
    Route::get('/log-index', [ActivityLogController::class, 'index'])->name('log-index');

    // User Account Module
    Route::get('/user-account', [UserController::class, 'index'])->name('user-index');
    Route::get('/user-account-add', [UserController::class, 'create'])->name('user-create');
    Route::post('/user-account-add', [UserController::class, 'store'])->name('user-store');
});

Route::get('/forgot-password', [LoginRegisterController::class, 'forgot_password'])->name('forgot-password');
Route::post('/forgot-password', [LoginRegisterController::class, 'forgot_password_link'])->name('forgot-password-link');
Route::get('/reset-password/{token}', [LoginRegisterController::class, 'reset_password'])->name('password.reset');
Route::post('/reset-password', [LoginRegisterController::class, 'reset_password_update'])->name('reset-password-update');
