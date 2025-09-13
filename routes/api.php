<?php

use App\Http\Controllers\Api\CategoriesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;

Route::get('/categories/allData',[CategoriesController::class,'index']);
Route::get('/categories/showone/{id}',[CategoriesController::class,'show']);
Route::post('/categories/store',[CategoriesController::class,'create']);
Route::put('/categories/update/{id}', [CategoriesController::class, 'update']);
Route::delete('/categories/delete/{id}', [CategoriesController::class, 'destroy']);

