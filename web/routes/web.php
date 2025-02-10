<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\MainController;

///Route::middleware(['auth'])->group(function () {

Route::prefix('admin')->group(function () {
    // Route::get('/', [MainController::class, 'index'])->name('admin');
    // Route::get('main', [MainController::class, 'index']);

    #Category
    Route::prefix('categories')->group(function () {
        Route::get('add', [CategoryController::class, 'create']);
        Route::post('add', [CategoryController::class, 'store']);
        Route::get('list', [CategoryController::class, 'index']);
        Route::get('edit/{category}', [CategoryController::class, 'show']);
        Route::post('edit/{category}', [CategoryController::class, 'update']);
        Route::DELETE('destroy', [CategoryController::class, 'destroy']);
    });

    #Product
    Route::prefix('products')->group(function () {
        Route::get('add', [ProductController::class, 'create']);
        Route::post('add', [ProductController::class, 'store']);
        Route::get('list', [ProductController::class, 'index']);
        Route::get('edit/{product}', [ProductController::class, 'show']);
        Route::post('edit/{product}', [ProductController::class, 'update']);
        Route::DELETE('destroy', [ProductController::class, 'destroy']);
    });

    #slider
    Route::prefix('sliders')->group(function () {
        Route::get('add', [SliderController::class, 'create']);
        Route::post('add', [SliderController::class, 'store']);
        Route::get('list', [SliderController::class, 'index']);
        Route::get('edit/{slider}', [SliderController::class, 'show']);
        Route::post('edit/{slider}', [SliderController::class, 'update']);
        Route::DELETE('destroy', [SliderController::class, 'destroy']);
    });

    #Upload
    Route::post('upload/services', [UploadController::class, 'store']);
});
///});

Route::get('/', [MainController::class, 'index']);
Route::post('/services/load-product', [MainController::class, 'loadProduct']);