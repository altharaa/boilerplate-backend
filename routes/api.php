<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

 Route::prefix('movies')->group(function () {
     Route::get('/', [\App\Http\Controllers\MovieController::class, 'get']);
     Route::post('/create', [\App\Http\Controllers\MovieController::class, 'store']);
     Route::put('/{movieId}', [\App\Http\Controllers\MovieController::class, 'update']);
     Route::delete('/{movieId}', [\App\Http\Controllers\MovieController::class, 'destroy']);
 });
