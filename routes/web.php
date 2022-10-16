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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
// function () {
    // return view('welcome');
// });

Auth::routes();
// Route::get('dashboard', 'App\Http\Controllers\UserController@dashboard')->middleware('auth');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/category/{id}', [App\Http\Controllers\HomeController::class, 'products_category'])->name('category');
Route::get('/product/{id}', [App\Http\Controllers\HomeController::class, 'product_details'])->name('product');

Route::middleware(['auth'])->group(function () {

    Route::post('/addCart', [App\Http\Controllers\CartController::class, 'store'])->name('add_to_cart');
    Route::get('/showCart', [App\Http\Controllers\CartController::class, 'index'])->name('cart');
    Route::delete('/Cart/{id}', [App\Http\Controllers\CartController::class, 'destroy'] )->name('deleteItem');
    Route::get('/placeOrder', [App\Http\Controllers\OrderController::class, 'view_checkout_page'])->name('checkout');
    Route::post('/checkout', [App\Http\Controllers\OrderController::class, 'store'])->name('checkout_cart');



    Route::post('/member/{id}/update', 'EmployeeController@update')->name('updateemployee');
    Route::delete('/member/{id}/delete', 'EmployeeController@destroy')->name('deleteemployee');
    Route::put('/member/{id}/restore', 'EmployeeController@restore')->name('restoreemployee');
    Route::delete('/member/{id}/deleted', 'EmployeeController@permanentlyDelete')->name('restoreemployee');
    Route::get('/member/test', 'EmployeeController@genEmp')->name('addemployees');

});
