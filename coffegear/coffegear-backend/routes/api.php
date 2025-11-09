<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BrandController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CategoryController;

Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'index']);
    Route::get('flash-deals', [ProductController::class, 'flashDeals']);
    Route::get('search/{query}', [ProductController::class, 'search']);
    Route::get('/filter', [ProductController::class, 'filter']);
    Route::get('/slug/{slug}', [ProductController::class, 'showBySlug']);
    Route::get('/category/slug/{slug}', [ProductController::class, 'byCategorySlug']);
    Route::get('/{id}', [ProductController::class, 'show']);
});

Route::prefix('categories')->group(function () {
    Route::get('/main', [CategoryController::class, 'mainCategories']);
    Route::get('/{slug}/subcategories', [CategoryController::class, 'subcategoriesByParentSlug']);
    Route::get('/{slug}/products', [CategoryController::class, 'productsByCategorySlug']);
    Route::get('/slug/{slug}', [CategoryController::class, 'showBySlug']);
    Route::get('/categories/{slug}/brands', [CategoryController::class, 'brandsByCategorySlug']);
});

Route::prefix('brands')->group(function () {
    Route::get('/', [BrandController::class, 'index']);
});
