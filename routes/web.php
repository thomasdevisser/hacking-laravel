<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SocialController;

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
Route::get('/update-profile-image', [UserController::class, 'renderProfileImageForm']);
Route::post('/update-profile-image', [UserController::class, 'updateProfileImage']);

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
Route::get('/profile/{user:username}/followers', [UserController::class, 'renderProfileFollowers']);
Route::get('/profile/{user:username}/following', [UserController::class, 'renderProfileFollowing']);

/**
 * Social Interactions
 */
Route::post('/follow/{user:username}', [SocialController::class, 'follow']);
Route::post('/unfollow/{user:username}', [SocialController::class, 'unfollow']);

/**
 * Search Routes
 */
Route::get('/search/{term}', [SearchController::class, 'search']);