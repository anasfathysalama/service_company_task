<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\ParcelController as ApiParcelController;
use App\Http\Controllers\general\ParcelController;
use Illuminate\Support\Facades\Route;


Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);


Route::middleware('auth:sanctum')->group(function () {
    Route::get('logout', [AuthController::class, 'logout']);

    Route::get('parcels', [ApiParcelController::class, 'index']);
    Route::post('parcels', [ParcelController::class, 'store']);
});
