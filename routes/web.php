<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PerfumeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;

// الصفحة الرئيسية تعرض قائمة العطور مع بياناتها
Route::get('/', [PerfumeController::class, 'index'])->name('home');

// لوحة التحكم
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// مسارات محمية للمصادقة
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('perfumes', PerfumeController::class)->names('perfumes');
    Route::resource('categories', CategoryController::class)->names('categories');
    Route::resource('users', UserController::class)->names('users');
    Route::resource('orders', OrderController::class)->names('orders');
    Route::resource('order_items', OrderItemController::class)->names('order_items');
});

// تضمين ملفات ال   مصادقة الجاهزة
require __DIR__.'/auth.php';
