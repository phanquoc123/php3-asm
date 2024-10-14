<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\authen\AdminController;
use App\Http\Controllers\authen\AuthenController;
use App\Http\Controllers\client\HomeController;
use App\Http\Middleware\isAdmin;
use Illuminate\Support\Facades\Route;

//////////////////////////////////////////////////////

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::group(['middleware' => 'isAdmin'], function () {
        Route::prefix('/admin')->group(function () {

            Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

            ////////////// Dashboad

            // categories

            Route::prefix('/categories')->group(function () {

                Route::get('list',           [CategoryController::class, 'index'])->name('category.list');
                Route::get('create',         [CategoryController::class, 'create'])->name('category.create');
                Route::post('store',         [CategoryController::class, 'store'])->name('category.store');
                Route::get('edit/{id}',      [CategoryController::class, 'edit'])->name('category.edit');
                Route::put('update/{id}',    [CategoryController::class, 'update'])->name('category.update');
                Route::delete('delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');
            });

            // End categories

            Route::prefix('products')->group(function () {
                Route::get('list',      [ProductController::class, 'index'])->name('product.list');
                Route::get('create',    [ProductController::class, 'create'])->name('product.create');
                Route::post('store',    [ProductController::class, 'store'])->name('product.store');
                Route::get('edit/{id}',      [ProductController::class, 'edit'])->name('product.edit');
                Route::put('update/{id}',    [ProductController::class, 'update'])->name('product.update');
                Route::delete('delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
                // Route::post('restore/{id}', [ProductController::class, 'restore'])->name('product.restore');
            });

            /// User Controller

            Route::prefix('users')->group(function () {
                Route::get('list',           [UserController::class, 'index'])->name('user.list');
                Route::get('create',         [UserController::class, 'create'])->name('user.create');
                Route::post('store',         [UserController::class, 'store'])->name('user.store');
                Route::get('edit/{id}',      [UserController::class, 'edit'])->name('user.edit');
                Route::put('update/{id}',    [UserController::class, 'update'])->name('user.update');
                Route::delete('delete/{id}', [UserController::class, 'delete'])->name('user.delete');
                // Route::post('restore/{id}', [ProductController::class, 'restore'])->name('product.restore');
            });


            
        });
    });
});

    // Các route chỉ dành cho admin
    // Route::prefix('/admin')->group(function () {

    //     Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    //     /////// Authenticaution
    
    
    
    //     ////////////// Dashboad
    
    //     // categories
    
    //     Route::prefix('/category')->group(function () {
    
    //         Route::get('list', [CategoryController::class, 'index'])->name('category.list');
    //         Route::get('create', [CategoryController::class, 'create'])->name('category.create');
    //         Route::post('store', [CategoryController::class, 'store'])->name('category.store');
    //         Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    //         Route::put('update/{id}', [CategoryController::class, 'update'])->name('category.update');
    //         Route::delete('delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');
    //     });
    
    //     // End categories
    
    //     Route::prefix('product')->group(function () {
    //         Route::get('list', [ProductController::class, 'index'])->name('product.list');
    //         Route::get('create', [ProductController::class, 'create'])->name('product.create');
    //         Route::post('store', [ProductController::class, 'store'])->name('product.store');
    //         Route::get('edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    //         Route::put('update/{id}', [ProductController::class, 'update'])->name('product.update');
    //         Route::delete('delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
    //     });
        
    // })->middleware(['auth',isAdmin::class]);
