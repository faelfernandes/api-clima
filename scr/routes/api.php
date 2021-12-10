<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClimateController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('climates', [ClimateController::class, 'index']);
Route::get('climate/{city}', [ClimateController::class, 'show']);
Route::post('climate', [ClimateController::class, 'store']);
Route::put('climate/{id}', [ClimateController::class, 'update']);
Route::delete('climate/{id}', [ClimateController::class, 'destroy']);
