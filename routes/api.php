<?php

use App\Http\Controllers\Api\ReservationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
//nyilvanos vegpontok
Route::get('/hello', function (Request $request) {
    return response()->json(['message'=>'Hello API']);
});
Route::post('/register',[AuthController::class, 'register']);
Route::post('/login',[AuthController::class, 'login']);
//Authentikalt vegpontok
Route::middleware('auth:sanctum')-> post('/logout',[AuthController::class, 'logout']);

Route::get('auth:sanctum',[ReservationController::class, 'index']); // összes foglalás
Route::get('auth:sanctum',[ReservationController::class, 'show']); // egy foglalás
Route::post('auth:sanctum',[ReservationController::class, 'store']); // egy foglalás rögzítése
Route::put('auth:sanctum',[ReservationController::class, 'update']); // egy foglalás minden mezőjét módosítom
Route::patch('auth:sanctum',[ReservationController::class, 'update']); // egy foglalás néhány mezőjét módosítom
Route::delete('auth:sanctum',[ReservationController::class, 'destroy']); // egy foglalás törlése