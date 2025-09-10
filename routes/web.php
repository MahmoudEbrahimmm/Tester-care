<?php


use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\CartController;
use Illuminate\Support\Facades\Route;



// Route::get('/', function () {
//     return view('front.index');
// });

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('product/show/{product:slug}',[HomeController::class,'showProduct'])
    ->name('show.product');

Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::get('add.to.cart/{id}',[CartController::class,'addToCart'])->name('add.to.cart');
Route::post('/cart-update', [CartController::class, 'cartUpdate'])->name('cart.update');


Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
Route::post('/checkout/store', [CartController::class, 'checkoutStore'])->name('checkout.store');


require __DIR__.'/auth.php';
require __DIR__.'/dashboard.php';
