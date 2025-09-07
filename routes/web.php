<?php
use App\Http\Controllers\Front\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth.login');
});

Route::get('/home',[HomeController::class,'index'])->name('home');





require __DIR__.'/auth.php';
require __DIR__.'/dashboard.php';
