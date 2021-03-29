<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShoppingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\DashboardController;
Route::resource('shoppings', ShoppingController::class)->middleware('auth');
Route::resource('payments', PaymentController::class)->middleware('auth');
Route::resource('shopping_details', \App\Http\Controllers\ShoppingDetailController::class)->middleware('auth');;
Route::resource('payments', PaymentController::class)->middleware('auth');;
Route::resource('dashboard',DashboardController::class)->middleware('auth');;
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');


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

Route::get('/payment_calculator', function () {
    return view('dashboard.index');
})->middleware('auth');


Auth::routes(['register'=>true]);


/* Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); */
