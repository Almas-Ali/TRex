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
Route::get('post/{slug}', [postController::class, 'post'])->name('post');
Route::get('about/', [postController::class, 'about'])->name('about');
Route::get('categories/', [categoryController::class, 'list_category'])->name('list_category');
Route::get('categories/{slug}', [categoryController::class, 'single_category'])->name('single_category');
Route::get('tag/{slug}', [categoryController::class, 'single_tag'])->name('single_tag');
Route::get('privacy-policy/', [postController::class, 'privacy_policy'])->name('privacy_policy');

Route::post('like', [postController::class, 'LikePost'])->name('like')->middleware('auth');
Route::post('likecmt', [postController::class, 'LikeComments'])->name('LikeComments')->middleware('auth');
Route::post('comment', [postController::class, 'create_comment'])->name('create_comment')->middleware('auth');
Route::post('reply', [postController::class, 'create_reply'])->name('create_reply')->middleware('auth');


Route::middleware('auth')->prefix('users')->group(function () {
    Route::get('dashboard', [userController::class, 'user_dashboard'])->name('user_dashboard');
    Route::get('profile', [userController::class, 'user_profile'])->name('user_profile');
    Route::get('profile/settings', [userController::class, 'user_profile_settings'])->name('user_profile_settings');
    Route::get('/settings/general', [userController::class, 'user_profile_update'])->name('user_profile_update');

    // Route::get('/', [profileController::class, 'profile'])->name('profile');
    // Route::get('/settings', [profileController::class, 'profile_settings'])->name('profile_settings');
    // Route::post('/settings/general/save', [profileController::class, 'profile_update_save'])->name('profile_update_save');
    Route::get('/settings/password', [userController::class, 'user_change_password'])->name('user_change_password');
    // Route::get('/settings/password/save', [profileController::class, 'change_password_save'])->name('change_password_save');
});

Route::prefix('admin')->group(function () {
    
    Route::get('dashboard/', [postController::class, 'dashboard'])->name('dashboard') ->middleware('auth', 'isAdminCheck');

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
        Route::post('add/', [categoryController::class, 'add_category'])->name('add_category');
        Route::post('edit/{id}', [categoryController::class, 'edit_category'])->name('edit_category');
        Route::get('/', [categoryController::class, 'view_category'])->name('view_category');
        Route::get('delete/{id}', [categoryController::class, 'delete_category'])->name('delete_category');
    });


    // Settings of site 
    Route::middleware('auth', 'isAdminCheck')->prefix('settings')->group(function () {
        Route::get('social', [settingsController::class, 'social_settings'])->name('social_settings');
        Route::post('social/update', [settingsController::class, 'save_social'])->name('save_social');
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

    Route::middleware('auth')->prefix('profile')->group(function() {
        Route::get('/', [profileController::class, 'profile'])->name('profile');
        Route::get('/settings', [profileController::class, 'profile_settings'])->name('profile_settings');
        Route::get('/settings/general', [profileController::class, 'profile_update'])->name('profile_update');
        Route::post('/settings/general/save', [profileController::class, 'profile_update_save'])->name('profile_update_save');
        Route::get('/settings/password', [profileController::class, 'change_password'])->name('change_password');
        Route::post('/settings/password/save', [profileController::class, 'change_password_save'])->name('change_password_save');
    });

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