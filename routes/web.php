<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RestaurantController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;


Route::redirect('/', '/login');

// Route::get('/v1', function () {
//     return view('index');
//     return view('auth.login3');
// });

Route::get('/test', function () {
    // return view('index');
    // return view('layouts.apptest');
    return view('auth.login3');
});

Route::get('/v1', [SearchController::class, 'index'])->name('v1');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {
    
    // Test

    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
        // Route::redirect('/', '/admin/buses');
    
        // Categories
        Route::resource('categories', CategoryController::class);
        
        // Restaurants
        Route::resource('restaurants', RestaurantController::class);
    
        // Reviews
        Route::resource('reviews', ReviewController::class);
    
        // Permissions
        Route::resource('permissions', PermissionController::class);
    
        // Roles
        Route::resource('roles', RoleController::class);
    
        // Users
        Route::resource('users', UserController::class);
    });
});
