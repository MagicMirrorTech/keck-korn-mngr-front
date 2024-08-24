<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\PageController;


Route::resource('pages', PageController::class);

Route::redirect('/', '/pages/');

Route::get('/welcome', function () {
    return view('welcome');
});