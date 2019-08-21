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
    Route::get('/admin/products', 'AdminController@viewProducts');
    Route::match(['get','post'], '/admin/add-products', 'AdminController@addProducts');

    //Brand Routes
    Route::get('admin/brands', 'AdminController@viewBrands');
    Route::match(['get', 'post'], '/admin/add-brands', 'AdminController@addBrands');
});