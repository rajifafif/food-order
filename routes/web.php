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
        return redirect('dashboard');
    });

    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

    Route::get('order-table/{id}', [OrderController::class, 'orderOnTable'])->name('order-table');
    Route::post('order-add-food', [OrderController::class, 'orderAddFood'])->name('order-add-food');
    Route::post('order-delete-food', [OrderController::class, 'orderDeleteFood'])->name('order-add-food');
    Route::post('order-close/{id}', [OrderController::class, 'orderClose'])->name('order-close');
    Route::get('orders/print', [OrderController::class, 'print'])->name('orders.print');
    Route::get('orders/{id}', [OrderController::class, 'show'])->name('orders.show');
    Route::get('orders/{id}/edit', [OrderController::class, 'edit'])->name('orders.edit');
    Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
    Route::resource('foods', FoodController::class);
});
