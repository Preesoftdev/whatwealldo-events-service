<?php


use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\EventTaskController;
use App\Http\Controllers\Api\EventTicketController;
use App\Http\Controllers\Api\PendingTicketController;

use App\Http\Controllers\Api\PeopleGroupController;

use App\Http\Controllers\Api\SubEventController;
use App\Models\EventTicket;
use Illuminate\Support\Facades\Route;


Route::middleware(['verified'])->group(function () {
    Route::apiResource('events', EventController::class)->except(['show']);
    Route::apiResource('/events/{event}/tasks', EventTaskController::class)->except(['show']);
    Route::prefix('events')->group(function () {
        Route::get('/link/{link}', [EventController::class, 'getByLink']);
        Route::get('/dashboard', [EventController::class, 'getEventCounts']);
        Route::post('/{event}/publish', [EventController::class, 'publishEvent']);
        Route::get('/{event}/toggle-save', [EventController::class, 'toggleSave']);
        Route::post('/{event}/attachments', [EventController::class, 'uploadAttachments']);
        Route::post('/filter', [EventController::class, 'filterEvents']);
        Route::get('/search', [EventController::class, 'searchEvents']);

    });
   

   
    
    Route::prefix('events/{event}')->group(function () {
        Route::get('/tickets', [EventTicketController::class, 'index']); // Get all sub-events of an event
        Route::post('/tickets', [EventTicketController::class, 'store']); // Create a new sub-event
        Route::put('/tickets/{ticket}', [EventTicketController::class, 'update']);
        Route::delete('/tickets/{ticket}', [EventTicketController::class, 'destroy']);
    });
    Route::prefix('events/{event}')->group(function () {
        Route::get('/sub-events', [SubEventController::class, 'index']); // Get all sub-events of an event
        Route::post('/sub-events', [SubEventController::class, 'store']); // Create a new sub-event
        Route::put('/sub-events', [SubEventController::class, 'update']);
        Route::delete('/sub-events/{subEvent}', [SubEventController::class, 'destroy']);
        Route::post('/generate-bulk-tickets', [PendingTicketController::class, 'generateBulkTickets']);
        Route::get('/ticket-purchase/{ticketCode}', [PendingTicketController::class, 'show']);
        Route::get('/pending-tickets', [PendingTicketController::class, 'index']); // List all pending tickets
    });
    Route::apiResource('/groups', PeopleGroupController::class)->except(['show','update']);
    Route::post('/events/{event}/add-group-users', [EventController::class, 'addGroupUsers']);
    Route::post('/groups/{group}/add-member', [PeopleGroupController::class, 'addMember']);
    Route::post('/events/{event}/add-group-users', [EventController::class, 'addGroupUsers']);
});
