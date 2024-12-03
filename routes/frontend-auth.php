<?php

use App\Http\Controllers\Frontend\Auth\AuthenticationController;
use App\Http\Controllers\Frontend\Auth\ChangePasswordController;
use App\Http\Controllers\Frontend\Auth\ForgotPasswordController;
use App\Http\Controllers\Frontend\Auth\ResetPasswordController;
use App\Http\Controllers\Frontend\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::middleware(['set_language'])->group(function () {
    Route::get('login', [AuthenticationController::class, 'login'])->name('login');
    Route::post('login', [AuthenticationController::class, 'store'])->name('login.store');

    Route::get('register', [RegisterController::class, 'register'])->name('register');
    Route::post('register', [RegisterController::class, 'store'])->name('register.store');

    Route::get('forgot-password', [ForgotPasswordController::class, 'index'])->name('password.request');
    Route::post('forgot-password', [ForgotPasswordController::class, 'store'])->name('password.email');

    Route::get('reset-password/{email}/{token}', [ResetPasswordController::class, 'index'])->name('password.reset');
    Route::post('reset-password', [ResetPasswordController::class, 'store'])->name('password.store');

    Route::get('change-password', [ChangePasswordController::class, 'index'])->name('change-password');
    Route::post('change-password', [ChangePasswordController::class, 'update'])->name('change-password.update');

    Route::middleware('auth', 'role:student')->group(function () {
        Route::post('logout', [AuthenticationController::class, 'logout'])->name('logout');
    });
});