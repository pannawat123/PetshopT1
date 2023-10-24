<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Auth\LoginController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layouts.master');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [HomeController::class, 'index']);
Route::get('/cart/view', [CartController::class, 'viewCart']);
Route::get('/cart/add/{id}', [CartController::class, 'addToCart']);
Route::get('/cart/delete/{id}', [CartController::class, 'deleteCart']);
Route::get('/cart/update/{id}/{qty}', [CartController::class, 'updateCart']);
Route::get('/cart/checkout', [App\Http\Controllers\CartController::class, 'checkout']);

Route::get('/logout',[LoginController::class, 'logout']);


