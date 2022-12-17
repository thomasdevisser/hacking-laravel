<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

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
Route::get('/posts/{post}', [PostController::class, 'renderPost']);
Route::post('/create-post', [PostController::class, 'create'])->middleware('auth');

/**
 * Profile Routes
 */
Route::get('/profile/{user:username}', [UserController::class, 'renderProfile']);