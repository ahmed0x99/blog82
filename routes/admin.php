<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::resource("categories", CategoryController::class)->middleware('auth');

Route::get("/users" , [UserController::class , "index"])->name("users.index");
Route::delete("/users/{user}" , [UserController::class , "destroy"])->name("users.destroy");

Route::get("/posts/{id}" , [PostController::class , "index"])->name("posts.index");
Route::delete("/posts/{post}" , [PostController::class , "destroy"])->name("posts.destroy");

?>