<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    HomeController,
};

Route::get('/', function () {
    return view('welcome');
});


Route::get('fetch-api', [HomeController::class, 'fetchApi']);