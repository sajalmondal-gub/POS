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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/orders','App\Http\Controllers\OrderController');//order.index 
Route::resource('/products','App\Http\Controllers\ProductController'); //product.index
Route::resource('/suppliers','App\Http\Controllers\SupplierController'); //supplier.index
Route::resource('/users','App\Http\Controllers\UserController'); //user.index
Route::resource('/companies','App\Http\Controllers\CompanyController'); //company.index
Route::resource('/transactions','App\Http\Controllers\TransactionController'); //transaction.index

