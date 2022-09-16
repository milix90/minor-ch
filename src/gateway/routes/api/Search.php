<?php

use App\Http\Controllers\api\SearchController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'search', 'as' => 'search.'], function () {
    Route::post('book', SearchController::class)->name('book');
});
