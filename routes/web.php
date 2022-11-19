<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');

Route::prefix('travel')->name('travel.')->group(function () {
    // Admin
    Route::get('/', [App\Http\Controllers\TravelController::class, 'index'])->name('index');
    Route::get('/{travel}', [App\Http\Controllers\TravelController::class, 'show'])->name('show');
    Route::put('/{travel}', [App\Http\Controllers\TravelController::class, 'update'])->name('update');
    Route::delete('/{travel}', [App\Http\Controllers\TravelController::class, 'destroy'])->name('destroy');
    Route::post('/', [App\Http\Controllers\TravelController::class, 'store'])->name('store');

    // Customer
    Route::get('list', [App\Http\Controllers\TravelController::class, 'list'])->name('list');
    Route::get('details', [App\Http\Controllers\TravelController::class, 'details'])->name('details');
});

Route::prefix('order')->name('order.')->group(function () {
    // Admin
    Route::get('/', [App\Http\Controllers\OrderController::class, 'index'])->name('index');
    Route::put('/{order}', [App\Http\Controllers\OrderController::class, 'update'])->name('update');
});

Route::prefix('user')->name('user.')->group(function () {
    // Admin
    // Route::get('/', [App\Http\Controllers\UserController::class, 'index'])->name('index');
});
