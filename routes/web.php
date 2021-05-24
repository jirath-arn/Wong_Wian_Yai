<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RestaurantController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;

use App\Http\Controllers\SearchController;


// Route::redirect('/', '/login');

// Route::get('/test', function () {
//     return view('client.detail');
// });

Route::get('/', [SearchController::class, 'index']);
Route::get('/details/{restaurant_name}', [SearchController::class , 'show']);

Auth::routes();

// Route::get('/home', [HomeController::class, 'index']);

Route::group(['middleware' => ['auth']], function () {
    
    Route::redirect('/home', '/');

    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
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
