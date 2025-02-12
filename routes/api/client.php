<?php


use App\Http\Controllers\Api\EventController;
use Illuminate\Support\Facades\Route;



Route::middleware(['verified'])->group(function () {
    Route::apiResource('events', EventController::class)->except(['show']);
});