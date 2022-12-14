<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\ReservationController;

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


    // reservations
    Route::resource('reservations', ReservationController::class);

    // tables
    Route::get('/tables/{table}/show', [TableController::class, 'show'])->name('tables.show');
    Route::get('/tables/create', [TableController::class, 'create'])->name('tables.create');
    Route::post('/tables/store', [TableController::class, 'store'])->name('tables.store');

    //products
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::get('/products/{product}/edit', [productController::class, 'edit'])->name('products.edit');
    Route::get('/products/{product}/delete', [productController::class, 'delete'])->name('products.delete');
    Route::get('/products', [productController::class, 'index'])->name('products.index');

    Route::put('/products/{product}/update', [productController::class, 'update'])->name('products.update');
    Route::post('/products/store', [productController::class, 'store'])->name('products.store');

    //menus
    Route::get('/menus', [MenuController::class, 'index'])->name('menu.index');
    Route::get('/menus/{menu}/edit', [menuController::class, 'edit'])->name('menu.edit');
    Route::get('/menus/{menu}/delete', [menuController::class, 'delete'])->name('menu.delete');
    Route::get('/menus/create', [menuController::class, 'create'])->name('menu.create');

    Route::post('/menus/store', [menuController::class, 'store'])->name('menu.store');
    Route::put('/menus/{menu}/update', [menuController::class, 'update'])->name('menu.update');

    //customer download
    Route::get('/customer_download', [CustomerController::class, 'download'])->name('customer_download.index');


    // ajax call
    Route::get('/tables/location', [TableController::class, 'location'])->name('tables.location');
});
