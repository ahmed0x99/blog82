<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::resource("categories", CategoryController::class)->middleware('auth');

Route::get("/users" , [UserController::class , "index"])->name("users.index");
Route::delete("/users/{user}" , [UserController::class , "destroy"])->name("users.destroy");

Route::get("/user/{id}/posts" , [PostController::class , "index"])->name("posts.index");
Route::resource("posts", PostController::class)->except(['index'])
->middleware('auth');

?>