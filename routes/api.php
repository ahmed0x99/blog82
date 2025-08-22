<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::apiResource("/categories" , CategoryController::class)->middleware('auth:sanctum');


// Route::post("/login" , [AuthController::class , 'login'])->name("api.login")->middleware('guest:sanctum');
// Route::post("/logout" , [AuthController::class , 'logout'])->name("api.logout")->middleware('auth:sanctum');
// Route::post("/tokens" , [AuthController::class , 'index'])->name("api.tokens")->middleware('auth:sanctum');

