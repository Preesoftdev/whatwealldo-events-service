<?php


use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\EventTaskController;
use App\Http\Controllers\Api\SubEventController;
use Illuminate\Support\Facades\Route;





Route::middleware(['verified'])->group(function () {
    Route::apiResource('events', EventController::class)->except(['show']);
    Route::apiResource('/events/{event}/tasks', EventTaskController::class)->except(['show']);
 

Route::prefix('events/{event}')->group(function () {
    Route::get('/sub-events', [SubEventController::class, 'index']); // Get all sub-events of an event
    Route::post('/sub-events', [SubEventController::class, 'store']); // Create a new sub-event
    Route::put('/sub-events', [SubEventController::class, 'update']);
    Route::delete('/sub-events/{subEvent}', [SubEventController::class, 'destroy']); 
});



});