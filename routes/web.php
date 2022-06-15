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

Auth::routes();



Route::group(['middleware' =>'admin'], function () {
	Route::get('/dashboard', 'App\Http\Controllers\Admin\DashboardController@index')->name('admin.dashboard');
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade'); 
	Route::get('map', function () {return view('pages.maps');})->name('map');
	Route::get('icons', function () {return view('pages.icons');})->name('icons'); 
	Route::get('table-list', function () {return view('pages.tables');})->name('table');

	Route::group(['prefix' => 'products'], function () {
		Route::get('/', [ProductController::class, 'index'])->name('products');
		Route::post('/', [ProductController::class, 'index'])->name('products.reload');
		Route::post('/create', [ProductController::class, 'create'])->name('products.create');
		Route::post('/update', [ProductController::class, 'update'])->name('products.update');
		Route::post('/delete', [ProductController::class, 'destroy'])->name('products.delete');
	});
	
	Route::group(['prefix' => 'bookings'], function () {
		Route::get('/', [BookingController::class, 'index'])->name('bookings');
	});
	
    Route::get('booking/{id}', [BookingController::class, 'view'])->name('bookingProducts');
});




