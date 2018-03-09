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

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/categories/{id}', 'ProductsByCategoryController@getProductsFromCategroy');
Route::get('/product/{id}', 'CurrentProductController@getCurrentProduct');

// ORDERS

Route::get('/order_details','OrdersController@index');
Route::post('/makeOrder','OrdersController@makeOrder');

// SEARCH 

Route::get('search/autocomplete', ['as' => 'search-autocomplete', 'uses' => 'SearchController@autocomplete']);
Route::get('search/searchresults', 'SearchController@getSearchResult');
Route::group(['middleware' => 'auth'], function(){

// CART
Route::post('addToCart','CartController@create')->middleware('auth');
Route::get('myCart','CartController@index')->middleware('auth');
Route::get('removeCartItem/{rowId}','CartController@removeItem')->middleware('auth');
      
// AdminCP 
Route::group(['middleware' => 'admin'], function(){

Route::get('/admincp','AdminController@index')->middleware('auth')->middleware('admin');
Route::get('/admincp/orders','AdminController@getOrders')->middleware('auth')->middleware('admin');
Route::post('/admincp/orderSent','AdminController@orderNotSent')->middleware('auth')->middleware('admin'); 
Route::post('/admincp/orderNotSent','AdminController@orderSent')->middleware('auth')->middleware('admin'); 
Route::get('/admincp/products','AdminController@getProducts')->middleware('auth')->middleware('admin');
Route::get('/admincp/addProduct','AdminController@getAddProduct')->middleware('auth')->middleware('admin');
Route::post('/admincp/addProduct','AdminController@addProduct')->middleware('auth')->middleware('admin');
Route::get('/admincp/categories','AdminController@getCategories')->middleware('auth')->middleware('admin');

});

});

// Auth

Auth::routes();