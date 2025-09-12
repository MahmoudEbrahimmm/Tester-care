<?php

use App\Http\Controllers\Dashboard\OrdersController;
use App\Http\Controllers\Dashboard\SpareController;
use App\Http\Controllers\Dashboard\UsersController;
use App\Http\Controllers\Dashboard\CategoriesController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\ProductsController;
use App\Http\Controllers\Front\ContactController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth'])->group(function () {
    Route::get('notifications/{id}/read', function ($id) {
        $user = auth()->user();
        // ابحث في كل إشعاراته (مقروءة أو غير مقروءة) ثم علمها كمقروءة
        $notification = $user->notifications()->find($id);

        if ($notification) {
            $notification->markAsRead();
            // وجه المستخدم إلى الـ URL المخزن داخل Notification إذا موجود
            $url = $notification->data['url'] ?? route('dashboard.orders.index');
            return redirect($url);
        }

        return redirect()->back();
    })->name('notifications.read');
});


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
Route::resource('spares',SpareController::class);


});