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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::match(['get','post'],'/logout','AdminController@logout');
Route::group(['middleware'=>'auth'], function(){
    //Product Routes
    Route::get('/admin/products', 'ProductsController@viewProducts');
    Route::match(['get','post'], '/admin/add-products', 'ProductsController@addProducts');
    Route::get('/admin/delete-product/{id}', 'ProductsController@deleteProducts');

    //Brand Routes
    Route::get('admin/brands', 'BrandController@viewBrands');
    Route::match(['get', 'post'], '/admin/add-brands', 'BrandController@addBrands');
});