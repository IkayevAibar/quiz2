<?php

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
Route::redirect('/', '/login');
Route::resource('/items','ItemController');
Route::resource('/orders','OrdersController');
Route::get('/order/{orders}', 'OrdersController@buy')->name('orders.buy');
Route::get('/adminorders', 'OrdersController@admin')->name('order.admin');

Route::get('/admin', 'ItemController@admin')->name('admin');
Route::post('/items/search', 'ItemController@search')->name('items.search');
Route::post('/items/{item}', 'ItemController@updateConcretno')->name('items.updateConcretno');
Route::post('/item/{item}/buy', 'ItemController@buy')->name('item.buy');
Route::post('/item/{item}/delete', 'ItemController@delete')->name('item.delete');


