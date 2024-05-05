<?php

use App\Http\Controllers\FincasController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductoresController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/productores', [ProductoresController::class, 'index']);
Route::get('/fincas', [FincasController::class, 'index']);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
