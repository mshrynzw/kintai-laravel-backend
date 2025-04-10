<?php

use App\Http\Controllers\StampController;
use Illuminate\Support\Facades\Route;

Route::get('/stamps', [StampController::class, 'index']);
Route::get('/stamps/monthly', [StampController::class, 'monthly']);
Route::post('/stamps', [StampController::class, 'store']);
