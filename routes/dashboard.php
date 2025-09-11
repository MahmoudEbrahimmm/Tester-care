<?php

use App\Http\Controllers\Dahboard\UsersController;
use App\Http\Controllers\Dashboard\CategoriesController;
use App\Http\Controllers\Dashboard\ProductsController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/index', function () {
    return view('dashboard.index');
})->name('dashboard');

Route::group([
    'middleware'=>[ 'auth','check.admin'],
    'prefix'=>'dashboard',
    'as'=>'dashboard.'

], function(){
    
Route::resource('categories',CategoriesController::class);
Route::resource('products',ProductsController::class); 
Route::resource('users',UsersController::class); 
Route::get('contact/admin',[ContactController::class,'showContact'])->name('dash.contact');


});