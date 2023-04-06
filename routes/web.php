<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Auth::routes();

Route::get('/phpmyadmin', function () {
    return redirect()->to('http://127.0.0.1:8001');
});

Route::get('/', 'App\Http\Controllers\HomeController@index');

Route::get('/admin', 'App\Http\Controllers\AdminController@index')->middleware('auth')->middleware('admin')->name('admin.index');

Route::get('/admin/orders', 'App\Http\Controllers\Admin\OrderController@index')->name('admin.orders.index');
Route::get('/admin/orders/{id}', 'App\Http\Controllers\Admin\OrderController@show')->name('admin.orders.show');
Route::get('/admin/orders/{id}/edit', 'App\Http\Controllers\Admin\OrderController@edit')->name('admin.orders.edit');
Route::put('/admin/orders/{id}', 'App\Http\Controllers\Admin\OrderController@update')->name('admin.orders.update');

Route::resource('admin/products', 'App\Http\Controllers\Admin\ProductController')->except(['index', 'show']);
Route::get('admin/products', 'App\Http\Controllers\Admin\ProductController@index')->name('admin.products.index');
Route::get('admin/products/{id}', 'App\Http\Controllers\Admin\ProductController@show')->name('admin.products.show');
Route::get('admin/products/create', 'App\Http\Controllers\Admin\ProductController@create')->name('admin.products.create');
Route::post('admin/products/store', 'App\Http\Controllers\Admin\ProductController@store')->name('admin.products.store');
Route::get('admin/products/{id}/edit', 'App\Http\Controllers\Admin\ProductController@edit')->name('admin.products.edit');
Route::put('admin/products/{id}/update', 'App\Http\Controllers\Admin\ProductController@update')->name('admin.products.update');
Route::delete('admin/products/{id}/destroy', 'App\Http\Controllers\Admin\ProductController@destroy')->name('admin.products.destroy');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/login', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'App\Http\Controllers\Auth\LoginController@login');
Route::post('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::get('/catalog', 'App\Http\Controllers\CatalogController@index')->name('catalog.index');
Route::get('/products/{id}', [App\Http\Controllers\ProductController::class, 'show'])->name('product.show');

Route::post('/cart/add', 'App\Http\Controllers\CartController@add')->name('cart.add');
Route::post('/cart/remove', 'App\Http\Controllers\CartController@remove')->name('cart.remove');
Route::post('/cart/checkout', 'App\Http\Controllers\CartController@checkout')->name('cart.checkout');
Route::get('/cart', 'App\Http\Controllers\CartController@index')->name('cart.index');

Route::get('/orders/{id}', 'App\Http\Controllers\OrderController@show')->name('order.show');

Route::get('/contact', function () {
    return view('contact');
});
