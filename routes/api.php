<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogController;



Route::get('/logs', [LogController::class, 'getLogs']);
require base_path('routes/api/client.php');
