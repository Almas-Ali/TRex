<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\postController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\settingsController;
use App\Http\Controllers\contactController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\userController;
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

// Main frontend routes 
Route::get('/', [postController::class, 'index'])->name('index');
Route::get('posts/{slug}', [postController::class, 'posts'])->name('posts');
Route::get('about/', [postController::class, 'about'])->name('about');
Route::get('categories/', [categoryController::class, 'list_category'])->name('list_category');
Route::get('privacy-policy/', [postController::class, 'privacy_policy'])->name('privacy_policy');
Route::get('dashboard/', [postController::class, 'dashboard'])->name('dashboard') ->middleware('auth', 'isAdminCheck');
Route::get('user/dashboard/', [postController::class, 'user_dashboard'])->name('user_dashboard') ->middleware('auth');


// CRUD of post 
Route::middleware('auth', 'isAdminCheck')->prefix('post')->group(function () {
    Route::get('add/', [postController::class, 'add_post'])->name('add_post');
    Route::post('create', [postController::class, 'create_post'])->name('create_post');
    Route::get('edit/{id}', [postController::class, 'edit_post'])->name('edit_post');
    Route::post('edit/{id}/update', [postController::class, 'post_update'])->name('post_update');
    Route::get('/', [postController::class, 'view_post'])->name('view_post');
    Route::get('delete/{id}', [postController::class, 'delete_post'])->name('delete_post');
});


// CRUD of category 
Route::middleware('auth', 'isAdminCheck')->prefix('category')->group(function () {
    Route::get('add/', [categoryController::class, 'add_category'])->name('add_category');
    Route::post('edit/{id}', [categoryController::class, 'edit_category'])->name('edit_category');
    Route::get('/', [categoryController::class, 'view_category'])->name('view_category');
    Route::get('delete/{id}', [categoryController::class, 'delete_category'])->name('delete_category');
});


// Settings of site 
Route::middleware('auth', 'isAdminCheck')->prefix('settings')->group(function () {
    Route::get('general', [settingsController::class, 'general'])->name('general_settings');
    Route::post('general/update', [settingsController::class, 'save_general'])->name('save_general');
});

// Users of site 
Route::middleware('auth', 'isAdminCheck')->prefix('users')->group(function () {
    Route::get('/', [userController::class, 'all_users'])->name('all_users');
});

// Contact in site 
Route::prefix('contact')->group(function () {
    Route::get('/', [contactController::class, 'contact'])->name('contact');
    Route::post('create', [contactController::class, 'contact_create'])->name('contact_create');
    Route::get('view/all', [contactController::class, 'all_contacts'])->name('all_contacts')->middleware('auth', 'isAdminCheck');
    Route::get('view', [contactController::class, 'view_contact'])->name('view_contact')->middleware('auth', 'isAdminCheck');
});

Route::middleware('auth', 'isAdminCheck')->prefix('profile')->group(function() {
    Route::get('/', [profileController::class, 'profile'])->name('profile');
    Route::get('/settings', [profileController::class, 'profile_settings'])->name('profile_settings');
    Route::post('/settings/update', [profileController::class, 'update_profile'])->name('update_profile');
});


// Installer paths 
Route::prefix('install')->group(function () {
    Route::get('/', [installerController::class, 'installation'])->name('installation');
    Route::get('database-connection', [installerController::class, 'db_connection'])->name('db_connection');
    Route::post('database-connection/submit', [installerController::class, 'db_connection_submit'])->name('db_connection_submit');
});



// Auth view 
// Auth::routes(['verify' => true]);
Auth::routes();

Route::get('/home', function(){
    return redirect('/');
})->name('home');


Route::get('/update', function (\Codedge\Updater\UpdaterManager $updater) {

    // Check if new version is available
    if($updater->source()->isNewVersionAvailable()) {

        // Get the current installed version
        echo $updater->source()->getVersionInstalled();

        // Get the new version available
        $versionAvailable = $updater->source()->getVersionAvailable();

        // Create a release
        $release = $updater->source()->fetch($versionAvailable);

        // Run the update process
        $updater->source()->update($release);

    } else {
        echo "No new version available.";
    }

});