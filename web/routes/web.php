<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UploadController;
use App\Models\Product;

///Route::middleware(['auth'])->group(function () {

    Route::prefix('admin')->group(function () {
        // Route::get('/', [MainController::class, 'index'])->name('admin');
        // Route::get('main', [MainController::class, 'index']);

        #Category
        Route::prefix('categories')->group(function () {
            Route::get('add', [CategoryController::class, 'create']);
            Route::post('add', [CategoryController::class, 'store']);
        });

        Route::prefix('products')->group(function () {
            Route::get('add', [ProductController::class, 'create']);
            Route::post('add', [ProductController::class, 'store']);
            Route::get('list', [ProductController::class, 'index']);
            Route::get('edit/{product}', [ProductController::class, 'show']);
            Route::post('edit/{product}', [ProductController::class, 'update']);
        });

        #Upload
        Route::post('upload/services', [UploadController::class, 'store']);
    });
///});

