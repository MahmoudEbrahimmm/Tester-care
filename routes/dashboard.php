<?php

use App\Http\Controllers\Dashboard\CategoriesController;
use App\Http\Controllers\Dashboard\ProductsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/index', function () {
    return view('dashboard.index');
})->name('dashboard');
Route::group([
    // 'middleware'=>[ 'verified','auth.type:super-admin,admin'],
    'prefix'=>'dashboard',
    'as'=>'dashboard.'

], function(){
Route::resource('categories',CategoriesController::class);
Route::resource('products',ProductsController::class); 




// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });



});