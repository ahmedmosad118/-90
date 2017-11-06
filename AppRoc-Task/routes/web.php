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

Route::get('/product-add', 'ProductController@productAdd');
Route::get('myform/ajax','ProductController@getProperty');
Route::post("/upload-product","ProductController@postProduct");
Route::get('/', 'ProductController@productList');
Route::get('/product-delete/{id}', 'ProductController@deleteProduct');
Route::get('/product-edit/{id}', 'ProductController@editProduct');
Route::post("/edit-product/{id}","ProductController@putProduct");
