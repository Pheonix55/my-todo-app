<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\TodoController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Route::middleware('auth:sanctum')->group(function () {
//auth
Route::get('/me', [AuthController::class, 'me']);
Route::post('/logout', [AuthController::class, 'logout']);
//admin
Route::get('/all-users', [AuthController::class, 'getAllUsers']);
//todos
Route::get('/todos', [TodoController::class, 'index']);
Route::post('/todos/store', [TodoController::class, 'store']);
Route::post('/todos/update/{id}', [TodoController::class, 'update']);
Route::delete('/todos/delete/{id}', [TodoController::class, 'delete']);
// });
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
