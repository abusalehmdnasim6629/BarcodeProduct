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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin','AdminController@adminPanel');
Route::get('/add-product','AdminController@addProduct');
Route::post('/save-product','AdminController@saveProduct');
Route::get('/all-product','AdminController@all_Product');
Route::get('/','AdminController@homeindex');
Route::get('/add-cart/{product_code}','AdminController@addcart');
Route::get('/show-cart','AdminController@showcart');
Route::get('/detele-cart/{id}','AdminController@deletecart');
Route::post('/order-place','AdminController@order_place');
Route::get('/view-product/{product_code}','AdminController@view_product');
Route::get('/manage-order','AdminController@manage_order');
Route::get('/order-details/{order_id}','AdminController@order_details');
Route::post('/search','AdminController@search');
Route::get('/delete-product/{product_id}','AdminController@delete_product');
Route::get('/delete-order/{order_id}','AdminController@delete_order');
Route::get('/edit-product/{product_id}','AdminController@edit_product');
Route::post('/update-product/{product_id}','AdminController@update_product');