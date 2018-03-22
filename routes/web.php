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
Route::get('/categories/{id}', 'ProductsByCategoryController@getProductsFromCategroy')->name('category');
Route::get('/product/{id}', 'CurrentProductController@getCurrentProduct')->name('product.show');

// ORDERS

Route::get('/order_details','OrdersController@index');
Route::post('/makeOrder','OrdersController@makeOrder');

// SEARCH 

Route::get('search/autocomplete', ['as' => 'search-autocomplete', 'uses' => 'SearchController@autocomplete']);
Route::get('search/searchresults', 'SearchController@getSearchResult');


Route::group(['middleware' => 'auth'], function(){

// CART
Route::post('addToCart','CartController@create');
Route::get('myCart','CartController@index');
Route::get('removeCartItem/{rowId}','CartController@removeItem')->name('cart.removeItem');
      
// AdminCP 
Route::group(['middleware' => 'admin', 'namespace'=>'Admin' ,'prefix'=>'admincp'], function(){

Route::get('/','AdminController@index')->name('admincp.index');
Route::get('/orders','OrderController@getOrders')->name('admincp.orders');
Route::post('/orderSent','OrderController@orderNotSent'); 
Route::post('/orderNotSent','OrderController@orderSent'); 
Route::get('/products','ProductController@getProducts')->name('admincp.products');
Route::get('/addProduct','ProductController@getAddProduct')->name('admincp.addProduct');
Route::post('/addProduct','ProductController@addProduct');
Route::get('/categories','CategoryController@getCategories')->name('admincp.categories');

});

});

// Auth

Auth::routes();