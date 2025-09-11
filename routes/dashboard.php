<?php

use App\Http\Controllers\Dashboard\OrdersController;
use App\Http\Controllers\Dashboard\UsersController;
use App\Http\Controllers\Dashboard\CategoriesController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\ProductsController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/index', [DashboardController::class, 'index'])->name('dashboard');


Route::get('contact/admin',[ContactController::class,'show'])->name('dash.contact');
Route::get('/message',[DashboardController::class,'message'])->name('message');
Route::group([
    'middleware'=>[ 'auth','check.admin'],
    'prefix'=>'dashboard',
    'as'=>'dashboard.'

], function(){
    
Route::resource('categories',CategoriesController::class);
Route::resource('products',ProductsController::class); 
Route::resource('users',UsersController::class); 
Route::resource('orders',OrdersController::class); 


});