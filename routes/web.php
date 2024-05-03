<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/productores', function () {
    return view('productores');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
