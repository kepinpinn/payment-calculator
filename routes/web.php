<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShoppingController;
use App\Http\Controllers\ShoppingDetailController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PaymentDetailController;
use App\Http\Controllers\TelegramBotController;

Route::resource('shoppings', ShoppingController::class)->middleware('auth');
Route::resource('payments', PaymentController::class)->middleware('auth');
Route::resource('shopping_details', ShoppingDetailController::class)->middleware('auth');
Route::resource('payments', PaymentController::class)->middleware('auth');
Route::resource('payment_details',PaymentDetailController::class)->middleware('auth');
Route::resource('dashboard', DashboardController::class)->middleware('auth');


Route::get('register', '\App\Http\Controllers\Auth\RegisterController@create')->middleware('auth');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/updated-activity', '\App\Http\Controllers\TelegramBotController@updatedActivity')->middleware('auth');

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
    return redirect('dashboard');
})->middleware('auth');
Route::get('/', function () {
    return redirect('dashboard');
})->middleware('auth');


Auth::routes(['register'=>true]);

/* Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); */
