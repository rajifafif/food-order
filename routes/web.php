<?php

use App\Http\Controllers\FoodController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('order-table/{id}', [OrderController::class, 'orderOnTable'])->name('order-table');
    Route::post('order-add-food', [OrderController::class, 'orderAddFood'])->name('order-add-food');
    Route::post('order-delete-food', [OrderController::class, 'orderDeleteFood'])->name('order-add-food');
    Route::post('order-close/{id}', [OrderController::class, 'orderClose'])->name('order-close');
    Route::resource('orders', OrderController::class);
    Route::resource('foods', FoodController::class);
});
