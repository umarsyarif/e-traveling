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

//Main Page View
Route::get('/', function () {
    return view('main/pages/index');
});

Route::get('/login', function () {
    return view('main/pages/auth/login');
});

Route::get('/register', function () {
    return view('main/pages/auth/register');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('travel')->name('travel.')->group(function () {
    // Admin
    Route::get('/', [App\Http\Controllers\TravelController::class, 'index'])->name('index');
    Route::get('/{travel}', [App\Http\Controllers\TravelController::class, 'show'])->name('show');
    Route::put('/{travel}', [App\Http\Controllers\TravelController::class, 'update'])->name('update');
    Route::post('/', [App\Http\Controllers\TravelController::class, 'store'])->name('store');

    // Customer
    Route::get('list', [App\Http\Controllers\TravelController::class, 'list'])->name('list');
    Route::get('details', [App\Http\Controllers\TravelController::class, 'details'])->name('details');
});
