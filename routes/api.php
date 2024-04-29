<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MessageController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::post('/register', [AuthController::class,'register']);
Route::post('/login', [AuthController::class,'login']);
Route::post('/logout', [AuthController::class,'logout'])->middleware('auth:sanctum');

Route::get('/sent', [MessageController::class,'sentMessages'])->middleware('auth:sanctum');
Route::get('/received', [MessageController::class,'receivedMessages'])->middleware('auth:sanctum');
Route::post('/messages', [MessageController::class,'sendMessage'])->middleware('auth:sanctum');
