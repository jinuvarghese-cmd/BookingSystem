<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\BookingController;
use Illuminate\Support\Facades\Auth;
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


Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/products', [App\Http\Controllers\ProductController::class, 'index']);
Route::post('/products/add-to-cart', [App\Http\Controllers\ProductController::class, 'addToCart'])->name('addToCart');
Route::post('/booking/checkout', [App\Http\Controllers\BookingController::class, 'checkout'])->name('checkout');

Auth::routes();

Route::group(['middleware' =>'admin'], function () {
	Route::get('admin', 'App\Http\Controllers\Admin\DashboardController@index')->name('admin.dashboard');
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);

	Route::group(['prefix' => 'admin/products'], function () {
		Route::get('/', [ProductController::class, 'index'])->name('products');
		Route::post('/', [ProductController::class, 'index'])->name('products.reload');
		Route::post('/create', [ProductController::class, 'create'])->name('products.create');
		Route::post('/update', [ProductController::class, 'update'])->name('products.update');
		Route::post('/delete', [ProductController::class, 'destroy'])->name('products.delete');
	});
	
	Route::group(['prefix' => 'admin/bookings'], function () {
		Route::get('/', [BookingController::class, 'index'])->name('bookings');
		Route::get('/{id}', [BookingController::class, 'view'])->name('bookingProducts');
    });
});




