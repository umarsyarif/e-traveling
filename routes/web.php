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
    // Customer
    Route::get('list', [App\Http\Controllers\TravelController::class, 'list'])->name('list');
    Route::get('details/{travel}', [App\Http\Controllers\TravelController::class, 'details'])->name('details');

    // Admin
    Route::get('/', [App\Http\Controllers\TravelController::class, 'index'])->name('index');
    Route::get('/{travel}', [App\Http\Controllers\TravelController::class, 'show'])->name('show');
    Route::put('/{travel}', [App\Http\Controllers\TravelController::class, 'update'])->name('update');
    Route::delete('/{travel}', [App\Http\Controllers\TravelController::class, 'destroy'])->name('destroy');
    Route::post('/', [App\Http\Controllers\TravelController::class, 'store'])->name('store');
});

Route::prefix('order')->name('order.')->group(function () {
    // Customer
    Route::get('/list', [App\Http\Controllers\OrderController::class, 'list'])->name('list');
    Route::post('/', [App\Http\Controllers\OrderController::class, 'store'])->name('store');
    Route::get('/riwayat', [App\Http\Controllers\OrderController::class, 'history'])->name('history');
    Route::post('/testimoni', [App\Http\Controllers\OrderController::class, 'testimonialUpdate'])->name('testimonialUpdate');

    // Admin
    Route::get('/', [App\Http\Controllers\OrderController::class, 'index'])->name('index');
    Route::put('/{order}', [App\Http\Controllers\OrderController::class, 'update'])->name('update');
    Route::get('/order-pdf', [App\Http\Controllers\OrderController::class, 'orderPDF'])->name('orderPDF');
});

Route::prefix('karyawan')->name('employee.')->group(function () {
    // Admin
    Route::get('/', [App\Http\Controllers\EmployeeController::class, 'index'])->name('index');
    Route::post('/', [App\Http\Controllers\EmployeeController::class, 'store'])->name('store');
    Route::delete('/{employee}', [App\Http\Controllers\EmployeeController::class, 'destroy'])->name('destroy');
});
