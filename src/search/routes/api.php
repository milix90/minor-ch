<?php

use App\Http\Controllers\api\v1\SearchController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'v1',
    'middleware' => 'auth'
], function () {
    Route::post('search', SearchController::class)->name('search');
});
