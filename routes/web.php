<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CheckoutController;


Route::resource('pages', PageController::class);

Route::redirect('/', '/pages/');

Route::get('/home', [PageController::class, 'home'])->name('pages.home');
Route::get('/products', [PageController::class, 'product'])->name('pages.product');
Route::get('/checkout', [PageController::class, 'checkout'])->name('pages.checkout');
Route::get('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');


Route::get('/welcome', function () {
    return view('welcome');
});

