<?php


use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\EventTaskController;
use Illuminate\Support\Facades\Route;




Route::middleware(['verified'])->group(function () {
    Route::apiResource('events', EventController::class)->except(['show']);
    Route::get('/events/{event}/tasks', [EventTaskController::class, 'index']);
    Route::post('/events/{event}/tasks', [EventTaskController::class, 'store']);
    Route::put('/events/{event}/tasks', [EventTaskController::class, 'update']);
    Route::delete('/events/{event}/tasks', [EventTaskController::class, 'destroy']);
});