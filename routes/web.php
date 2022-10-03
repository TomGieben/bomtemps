<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TableController;

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
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // tables
    Route::get('/tables/{table}/show', [TableController::class, 'show'])->name('tables.show');
    Route::get('/tables/create', [TableController::class, 'create'])->name('tables.create');
    Route::post('/tables/store', [TableController::class, 'store'])->name('tables.store');

    // ajax call
    Route::get('/tables/location', [TableController::class, 'location'])->name('tables.location');
});
