<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

/*API*/
Route::post('api/login','HomeController@loginApi');
	/*PRODUK*/
		Route::get('api/get/produk/{token}','ProdukController@getProductApi');
		Route::post('api/post/produk/input/{token}','ProdukController@inputProduct');
		Route::post('api/post/produk/update/{id}/{token}','ProdukController@updateProduct');
		Route::get('api/get/produk/detail/{id}/{token}','ProdukController@detailProduct');
		Route::get('api/get/produk/delete/{id}/{token}','ProdukController@deleteProduct');

	