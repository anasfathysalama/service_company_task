<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\BikerController as ApiBikerController;
use App\Http\Controllers\api\ParcelController as ApiParcelController;
use App\Http\Controllers\general\BikerController;
use App\Http\Controllers\general\ParcelController;
use Illuminate\Support\Facades\Route;


Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);


Route::middleware('auth:sanctum')->group(function () {
    Route::get('logout', [AuthController::class, 'logout']);

    Route::get('sender-parcels', [ApiParcelController::class, 'index']);
    Route::post('sender-parcels', [ParcelController::class, 'store']);

    Route::get('biker-parcels', [ApiBikerController::class, 'index']);
    Route::post('biker-parcels', [BikerController::class, 'pickUpParcel']);
});
