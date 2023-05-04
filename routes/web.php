<?php

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

// Route::get('/', function () {
//     return view('pages.home');
// });

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('/categories', 'App\Http\Controllers\CategoryController@index')->name('categories');
Route::get('/details/{id}', 'App\Http\Controllers\DetailController@index')->name('detail');
Route::get('/cart', 'App\Http\Controllers\CartController@index')->name('cart');
Route::get('/success', 'App\Http\Controllers\CartController@success')->name('success');

Route::get('/register/success', 'App\Http\Controllers\Auth\RegisterController@success')->name('register-success');

Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
Route::get('/dashboard/products', 'App\Http\Controllers\DashboardProductController@index')->name('dashboard-product');
Route::get('/dashboard/products/create', 'App\Http\Controllers\DashboardProductController@create')->name('dashboard-product-create');
Route::get('/dashboard/products/{id}', 'App\Http\Controllers\DashboardProductController@details')->name('dashboard-product-details');


Route::get('/dashboard/transactions', 'App\Http\Controllers\DashboardTransactionController@index')->name('dashboard-transaction');
Route::get('/dashboard/transactions/{id}', 'App\Http\Controllers\DashboardTransactionController@details')->name('dashboard-transaction-details');


Route::get('/dashboard/settings', 'App\Http\Controllers\DashboardSettingController@store')->name('dashboard-settings-store');
Route::get('/dashboard/account', 'App\Http\Controllers\DashboardSettingController@account')->name('dashboard-settings-account');


// ->middleware(['auth', 'admin'])
Route::prefix('admin')
  // ->namespace('Admin')
  ->group( function(){
    Route::get('/', 'App\Http\Controllers\Admin\DashboardController@index')->name('admin-dashboard');
    Route::resource('category', 'App\Http\Controllers\Admin\CategoryController');
  });


// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

