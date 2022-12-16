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
Route::get('/', [UserController::class, 'homepage']);
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout']);

/**
 * Post Routes
 */
Route::get('/create-post', [PostController::class, 'renderForm']);
Route::get('/posts/{post}', [PostController::class, 'renderPost']);
Route::post('/create-post', [PostController::class, 'create']);
