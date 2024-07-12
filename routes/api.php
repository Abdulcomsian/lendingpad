<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    HomeController,
};

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('fetch-api', [HomeController::class, 'fetchApi']);
Route::post('meridian-check-data', [HomeController::class, 'checkData'])->name("check.data");
