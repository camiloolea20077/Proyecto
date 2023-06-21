<?php

use App\Http\Controllers\api\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('post/{category?}/category', [App\Http\Controllers\api\PostController::class, 'category']);
Route::get('category', [App\Http\Controllers\api\CategoryController::class, 'index']);
Route::get('category/all', [App\Http\Controllers\api\CategoryController::class, 'all']);
Route::get('post/{url_clean}/url_clean', [App\Http\Controllers\api\CategoryController::class, 'url_clean']);
Route::resource('/post', PostController::class);


?>