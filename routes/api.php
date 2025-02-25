<?php


use App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\LogController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




Route::get('/logs', [LogController::class, 'getLogs']);
require base_path('routes/api/client.php');


Route::get('/ticket-purchase/{code}/pay', [PaymentController::class, 'payTicket']);
Route::get('/payment-success', [PaymentController::class, 'index']);
Route::get('/payment-cancel', [PaymentController::class, 'Errormessage']);