<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CRUDs\CategoryController;
use App\Http\Controllers\CRUDs\PermissionController;
use App\Http\Controllers\CRUDs\RestaurantController;
use App\Http\Controllers\CRUDs\ReviewController;
use App\Http\Controllers\CRUDs\RoleController;
use App\Http\Controllers\CRUDs\UserController;

use App\Http\Controllers\SearchController;


// Route::get('/test', function () {
//     return view('client.detail');
// });

Route::get('/', [SearchController::class, 'index']);
Route::get('/details/{restaurant_name}', [SearchController::class , 'show']);

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::redirect('/home', '/');

    // Categories
    Route::resource('categories', CategoryController::class);
    Route::post('categories/destroy', [CategoryController::class, 'massDestroy'])->name('categories.massDestroy');
        
    // Restaurants
    Route::resource('restaurants', RestaurantController::class);

    // Reviews
    Route::resource('reviews', ReviewController::class);

    // Permissions
    Route::resource('permissions', PermissionController::class);
    Route::post('permissions/destroy', [PermissionController::class, 'massDestroy'])->name('permissions.massDestroy');

    // Roles
    Route::resource('roles', RoleController::class);
    Route::post('roles/destroy', [RoleController::class, 'massDestroy'])->name('roles.massDestroy');

    // Users
    Route::resource('users', UserController::class);
});
