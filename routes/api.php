<?php

use App\Http\Controllers\StampController;
use Illuminate\Support\Facades\Route;

Route::post('stamps', [StampController::class, 'store']);
Route::get('stamps', [StampController::class, 'index']);
