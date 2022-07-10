<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\postController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\settingsController;
use App\Http\Controllers\contactController;
use App\Http\Controllers\installerController;

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

Route::get('/', [postController::class, 'index'])->name('index');

Route::get('posts/{slug}', [postController::class, 'posts'])->name('posts');

Route::get('about/', [postController::class, 'about'])->name('about');

Route::get('dashboard/', [postController::class, 'dashboard'])->name('dashboard') ->middleware('auth');


// CRUD of post
Route::get('post/add/', [postController::class, 'add_post'])->name('add_post')->middleware('auth');

Route::post('post/create', [postController::class, 'create_post'])->name('create_post')->middleware('auth');

Route::get('post/edit/{id}', [postController::class, 'edit_post'])->name('edit_post')->middleware('auth');

Route::post('post/edit/{id}/update', [postController::class, 'post_update'])->name('post_update')->middleware('auth');

Route::get('post/', [postController::class, 'view_post'])->name('view_post')->middleware('auth');

Route::get('post/delete/{id}', [postController::class, 'delete_post'])->name('delete_post')->middleware('auth');


// CRUD of category
Route::get('category/add/', [categoryController::class, 'add_category'])->name('add_category')  ->middleware('auth');

Route::post('category/edit/{id}', [categoryController::class, 'edit_category'])->name('edit_category')->middleware('auth');

Route::get('category/', [categoryController::class, 'view_category'])->name('view_category')->middleware('auth');

Route::get('category/delete/{id}', [categoryController::class, 'delete_category'])->name('delete_category')->middleware('auth');


// Settings of site
Route::get('settings/general', [settingsController::class, 'general'])->name('general_settings')->middleware('auth');

Route::post('settings/general/update', [settingsController::class, 'save_general'])->name('save_general')->middleware('auth');

// Contact in site
Route::get('contact/', [contactController::class, 'contact'])->name('contact');

Route::post('contact/create', [contactController::class, 'contact_create'])->name('contact_create');

Route::get('contact/view/all', [contactController::class, 'all_contacts'])->name('all_contacts')->middleware('auth');

Route::get('contact/view', [contactController::class, 'view_contact'])->name('view_contact')->middleware('auth');


// Installer paths
Route::get('install/', [installerController::class, 'installation'])->name('installation');

Route::get('install/database-connection', [installerController::class, 'db_connection'])->name('db_connection');

Route::post('install/database-connection/submit', [installerController::class, 'db_connection_submit'])->name('db_connection_submit');



// Auth view
Auth::routes();

Route::get('/home', function(){
    return redirect('/');
})->name('home');
