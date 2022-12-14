<?php

use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1/client/'], function () {
    Route::post('register', [RegisterController::class, 'register'])->name('register');
    Route::post('login', [AuthController::class, 'login'])->name('login');
});
