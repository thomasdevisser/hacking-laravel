<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * Admin Routes
 */
Route::get('admin', [AdminController::class, 'dashboard'])->middleware('can:visitAdminPages');

/**
 * User Routes
 */
Route::get('/', [UserController::class, 'homepage'])->name('login');
Route::post('/register', [UserController::class, 'register'])->middleware('guest');
Route::post('/login', [UserController::class, 'login'])->middleware('guest');
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

/**
 * Post Routes
 */
Route::get('/create-post', [PostController::class, 'renderForm'])->middleware('auth');
Route::post('/create-post', [PostController::class, 'create'])->middleware('auth');
Route::get('/posts/{post}', [PostController::class, 'renderPost']);
Route::delete('/posts/{post}', [PostController::class, 'delete'])->middleware('can:delete,post');
Route::get('/posts/{post}/edit', [PostController::class, 'renderEditForm'])->middleware('can:update,post');
Route::put('/posts/{post}/edit', [PostController::class, 'update'])->middleware('can:update,post');

/**
 * Profile Routes
 */
Route::get('/profile/{user:username}', [UserController::class, 'renderProfile']);