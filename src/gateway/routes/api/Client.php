<?php

use App\Http\Controllers\api\LoginController;
use App\Http\Controllers\api\RegisterController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'auth', 'as' => 'auth.'], function () {
    Route::post('register', RegisterController::class)->name('register');
    Route::post('login', LoginController::class)->name('login');
});
