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
Route::get('/home', 'HomeController@index')->name('home');
Route::any('/product/importproduct/','ProductController@importproduct')->name('product.importproduct');
Route::any('/products', 'ProductController@index')->name('products');
Route::get('/product/create/', 'ProductController@create');
Route::post('/product/store/', 'ProductController@store');
Route::post('/product/update/{id}', 'ProductController@update');
Route::get('/product/edit/{id}', 'ProductController@edit');
Route::post('/product/update/{id}', 'ProductController@update');
Route::get('/product/destroy/{id}','ProductController@destroy');
Route::get('/product/getProducts/','ProductController@getProducts')->name('product.getProducts');
Route::get('/product/productdetail/{id}','ProductController@productdetail');

