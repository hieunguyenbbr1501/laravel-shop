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

Route::get('/home', 'HomeController@index')->name('home');
Route::match(['get','post'],'/logout','AdminController@logout');
Route::group(['middleware'=>'auth'], function(){
    //Product Routes
    Route::get('/admin/products', 'ProductsController@viewProducts');
    Route::get('/admin/add-products', 'ProductsController@addProducts');
    Route::post('/admin/insert-products', 'ProductsController@insertProducts');
    Route::get('/admin/delete-product/{id}', 'ProductsController@deleteProducts');
    Route::get('/admin/edit-products/{id}', 'ProductsController@editProducts');
    Route::post('/admin/update-products/{id}', 'ProductsController@updateProducts');

    //Brand Routes
    Route::get('admin/brands', 'BrandController@viewBrands');
    Route::get('/admin/add-brands', 'BrandController@addBrands');
    Route::post('admin/insert-brands', 'BrandController@store');
    Route::post('admin/update-brands/{id}', 'BrandController@update');
    Route::get('admin/delete-brands/{id}', 'BrandController@deleteBrands');
    Route::get('admin/edit-brands/{id}', 'BrandController@editBrands');

    //News Routes
    Route::get('admin/news', 'NewsController@index');
    Route::get('admin/add-news', 'NewsController@create');
    Route::post('admin/store-news', 'NewsController@store');
    Route::get('admin/edit-news/{id}', 'NewsController@edit');
    Route::post('admin/update-news/{id}', 'NewsController@update');
    Route::get('admin/delete-news/{id}', 'NewsController@destroy');
});
Route::get('/', 'HomePageController@index');