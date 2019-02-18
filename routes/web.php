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

Route::group(['middleware' => ['web']], function (){
	Route::get('/', 'pagesController@getIndex');
	Route::get('shop', 'pagesController@getProduct');
	Route::get('admin', 'brandsController@getAdmin');
	Route::get('products-front', 'pagesController@getProducts');
	Route::get('view/{id}', 'pagesController@viewCart')->name('view');
	Route::get('carts', 'cartController@carts')->name('cart');
	Route::get('cancel', 'pagesController@cancel')->name('cancel');
	Route::get('return', 'pagesController@return')->name('return');

	// Route::get('child', 'productsController@child');
	Route::resource('brands', 'brandsController');
	Route::resource('categories', 'categoryController');
	Route::resource('products', 'productsController');
	Route::resource('cart', 'cartController');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('products/fetch', 'productsController@fetch')->name('products.fetch');
Route::post('cart/update_cart', 'cartController@updateCart')->name('cart.update_cart');
Route::post('cart/add_cart', 'cartController@add_cart')->name('cart.add_cart');
Route::post('cart/addcart', 'cartController@addcart')->name('cart.addcart');
Route::get('add/{id}', 'pagesController@add')->name('add');
Route::get('category/{id}', 'pagesController@get_categories')->name('category');
Route::get('search_products/{id}', 'SearchController@get_searches')->name('search_products');
Route::post('payments', 'PaymentController@payWithpaypal')->name('payments');
Route::get('/search', 'SearchController@search')->name('search');
Route::get('create_paypal_plan', 'PaymentController@create_plan');