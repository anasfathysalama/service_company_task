<?php

use App\Http\Controllers\general\BikerController;
use App\Http\Controllers\general\ParcelController;
use App\Http\Controllers\web\DashboardController;
use App\Http\Controllers\web\LoginController;
use App\Http\Controllers\web\RegisterController;
use Illuminate\Support\Facades\Route;




Route::middleware('auth')->group(function () {

    Route::get('logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('sender-parcels', [ParcelController::class,'index'])->name('sender.index');
    Route::get('get-sender-parcels' , [ParcelController::class , 'getData']);
    Route::post('parcels' , [ParcelController::class , 'store']);

    Route::get('biker-parcels' , [BikerController::class , 'index'])->name('biker.index');
    Route::get('get-biker-parcels' , [BikerController::class , 'getData']);
    Route::post('parcels/pick-up' , [BikerController::class , 'pickUpParcel']);
});

Route::middleware('guest')->group(function () {

    Route::get('login', [LoginController::class, 'index'])->name('login.index');
    Route::post('login', [LoginController::class, 'store'])->name('login.store');

    Route::get('register', [RegisterController::class, 'index'])->name('register.index');
    Route::post('register', [RegisterController::class, 'store'])->name('register.store');
});




