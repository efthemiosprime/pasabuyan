<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\TripController;
// use L5Swagger\Http\Controllers\SwaggerController;
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

// Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/user/{id}', [UserController::class, 'getUser']);
Route::apiResource('trips', TripController::class);
// Route::get('/users/{id}', [UserController::class], 'show');
// Protected routes
// Route::middleware('auth:sanctum')->group(function () {
//     Route::post('/logout', [AuthController::class, 'logout']);
//     Route::put('/user', [UserController::class, 'edit']);
//     Route::put('/user/password', [UserController::class, 'updatePassword']);
// });

// Swagger routes
// Route::get('/documentation', [SwaggerController::class, 'api'])->name('l5-swagger.api');
// Route::get('/docs', [SwaggerController::class, 'docs'])->name('l5-swagger.docs');
// Route::get('/api-docs.json', [SwaggerController::class, 'api'])->name('l5-swagger.docs');