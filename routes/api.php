<?php

use App\Http\Controllers\Api\CategoriesController;
use App\Http\Controllers\Api\ProductsController;
use App\Http\Controllers\Api\SparesController;
use Illuminate\Support\Facades\Route;

// Categories
Route::apiResource('categories',CategoriesController::class);

// Products
Route::apiResource('products',ProductsController::class);

// Spare
Route::apiResource('spares',SparesController::class);