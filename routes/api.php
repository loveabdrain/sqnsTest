<?php

use Illuminate\Support\Facades\Route;
use Src\Controllers\AuthController;
use Src\Controllers\ReviewController;
use Src\Controllers\UserController;


Route::post('login', [AuthController::class, 'login'])->name('user.login');
Route::post('register', [AuthController::class, 'register'])->name('user.register');
Route::post('reset-password', [UserController::class, 'resetPassword'])->name('user.reset-password');
Route::post('forgot-password', [UserController::class, 'forgotPassword'])->name('user.forgot-password');

Route::prefix('reviews')->group(function () {
    Route::post('/', [ReviewController::class, 'create'])->name('review.create');
    Route::get('/', [ReviewController::class, 'getList'])->name('review.getList');
    Route::get('/{review}', [ReviewController::class, 'getById'])->name('review.getById');
});

Route::group(['middleware' => ['auth', 'api']], function () {
    Route::get('me', [AuthController::class, 'me'])->name('user.me');
    Route::prefix('users')->group(function () {
        Route::get('/{user}', [UserController::class, 'getById'])->name('user.getById');
        Route::post('/upload', [UserController::class, 'upload'])->name('user.upload');
        Route::post('/', [UserController::class, 'update'])->name('user.update');
        Route::post('/logout', [UserController::class, 'update'])->name('user.update');
    });
});
