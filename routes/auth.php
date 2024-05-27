<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {

    Route::controller(\App\Http\Controllers\Auth\RegisteredUserController::class)->group(function (){
        Route::get('register', 'create')->name('register');
        Route::post('register', 'store')->name('register.post');
    });

    Route::controller(\App\Http\Controllers\Auth\AuthenticatedSessionController::class)->group(function (){
        Route::get('start', 'create')->name('login');
        Route::post('login', 'store')->name('login.post');
    });

    Route::controller(\App\Http\Controllers\Auth\PasswordResetLinkController::class)->group(function (){
        Route::get('forgot-password', 'create')->name('password.request');
        Route::post('forgot-password', 'store')->name('password.email');
    });

    Route::controller(\App\Http\Controllers\Auth\NewPasswordController::class)->group(function (){
        Route::get('reset-password/{token}', 'create')->name('password.reset');
        Route::post('reset-password', 'store')->name('password.store');
    });

    Route::controller(\App\Http\Controllers\Auth\LoginWithController::class)->group(function (){
        Route::get('auth/{provider}/redirect', 'redirect')->name('auth.provider.redirect');
        Route::get('auth/{provider}/callback', 'callback')->name('auth.provider.callback');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::controller(\App\Http\Controllers\Auth\ConfirmablePasswordController::class)->group(function (){
        Route::get('confirm-password', 'show')->name('password.confirm');
        Route::post('confirm-password', 'store')->name('password.store');
    });

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::match(['get', 'post'], 'logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});
