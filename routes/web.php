<?php

use App\Events\ExcavatorUpdated;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExcavatorController;
use App\Http\Controllers\TrackingController;

Route::get('/', function () {
    // broadcast(new ExcavatorUpdated('halo'));
    // broadcast(new ExcavatorUpdated("Excavator updated!"))->toOthers();
    return view('welcome');
});

Route::get('/tracking', [TrackingController::class, 'index'])
->name('tracking.index');

Route::resource('excavators', ExcavatorController::class);