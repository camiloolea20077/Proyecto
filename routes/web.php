<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Models\Reply;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::resource('dashboard/category', CategoryController::class);
// Al iniciar el proyecto realizar la migración y ejecutar seeders para que se creee un usuario administrador desde el inicio.
Route::resource('dashboard/user', UserController::class);
Route::resource('dashboard/post', PostController::class);
Route::resource('dashboard/role', RoleController::class);
Route::resource('dashboard/reply', ReplyController::class);

Auth::routes();
//Rutas para redireccionar despues de loguear
Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'home'])->name('index');


//Route::get('dashboard/user', [App\Http\Controllers\UserController::class, 'store'])->middleware();
?>
