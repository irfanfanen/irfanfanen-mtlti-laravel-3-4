<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExcavatorController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('excavators', ExcavatorController::class);