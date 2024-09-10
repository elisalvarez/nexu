<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandsController;
use App\Http\Controllers\ModelsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
*/

Route::prefix('brands')->group(function () {
    Route::get('/', [BrandsController::class, 'index'])->name('brands.index');
    Route::post('/', [BrandsController::class, 'store'])->name('brands.store');
    Route::get('/{id}/models', [BrandsController::class, 'indexModels'])->name('brands.models.index');
    Route::post('/{id}/models', [BrandsController::class, 'storeModels'])->name('brands.models.store');
});

Route::prefix('models')->group(function () {
    Route::get('/', [ModelsController::class, 'index'])->name('models.index');
    Route::put('/{id}', [ModelsController::class, 'update'])->name('models.update');
});