<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\postController;
use App\Http\Controllers\categoryController;

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

Route::get('/', [postController::class, 'index'])                       ->name('index');
Route::get('posts/', [postController::class, 'posts'])                  ->name('posts');
Route::get('about/', [postController::class, 'about'])                  ->name('about');

// CRUD of post
Route::get('post/add/', [postController::class, 'add_post'])            ->name('add_post')      ->middleware('auth');
Route::get('post/edit/{id}', [postController::class, 'edit_post'])      ->name('edit_post')     ->middleware('auth');
Route::get('post/', [postController::class, 'view_post'])               ->name('view_post')     ->middleware('auth');
Route::get('post/delete/{id}', [postController::class, 'delete_post'])  ->name('delete_post')   ->middleware('auth');

// CRUD of category
Route::get('category/add/', [categoryController::class, 'add_category'])            ->name('add_category')  ->middleware('auth');
Route::post('category/edit/{id}', [categoryController::class, 'edit_category'])      ->name('edit_category') ->middleware('auth');
Route::get('category/', [categoryController::class, 'view_category'])               ->name('view_category') ->middleware('auth');
Route::get('category/delete/{id}', [categoryController::class, 'delete_category'])  ->name('delete_category')->middleware('auth');


// Auth view
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
