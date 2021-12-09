<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClimateController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// List climates
Route::get('climates', [ClimateController::class, 'index']);

// List single climate
Route::get('climate/{id}', [ClimateController::class, 'show']);

// Create new climate
Route::post('climate', [ClimateController::class, 'store']);

// Update climate
Route::put('climate/{id}', [ClimateController::class, 'update']);

// Delete climate
Route::delete('climate/{id}', [ClimateController::class, 'destroy']);

Route::get('temperature/{state}/{city}', [ClimateController::class, 'teste']);
