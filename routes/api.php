<?php

use App\Http\Controllers\apiIotController;
use App\Http\Controllers\iotController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Api untuk Iot
Route::post('/post', [apiIotController::class, 'store']);
Route::get('/update', [apiIotController::class, 'update']);
Route::get('/api', [apiIotController::class, 'index']);
Route::get('/relay1/{id}', [apiIotController::class, 'show']);
Route::get('/relay2/{id}', [apiIotController::class, 'show1']);

// Mengubah data Relay
Route::post('/ubah-perangkat', [iotController::class, 'update']);
Route::post('/ubah-pemanas', [iotController::class, 'update2']);
