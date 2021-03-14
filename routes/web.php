<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('welcome');
});
Route::get('/categoery', function () {
    return view('welcome');
});
Route::get('/products', function () {
    return view('welcome');
});
Route::get('/orders', function () {
    return view('welcome');
});
Route::get('/kfc', function () {
    return view('welcome');
});
Route::get('/everyday-value', function () {
    return view('welcome');
});
Route::get('/make-it-meal', function () {
    return view('welcome');
});
Route::get('/signature-boxes', function () {
    return view('welcome');
});
Route::get('/sharing', function () {
    return view('welcome');
});
Route::get('/promotions', function () {
    return view('welcome');
});
Route::get('/snacks', function () {
    return view('welcome');
});
Route::get('/mid-night-deals', function () {
    return view('welcome');
});
Route::get('/detail-product', function () {
    return view('welcome');
});
// Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');

Route::post('/register-user','AdminController@registerUser');

Route::post('/postCategoery','AdminController@postCategoery');
Route::get('/getCategoery', 'AdminController@getCategoery');
Route::delete('/deleteCategoery/{id}', 'AdminController@deleteCategoery');
Route::patch('/updateCategoery/{id}', 'AdminController@updateCategoery');

Route::post('/storeProducts','productController@storeProducts');
Route::get('/getProducts', 'productController@getProducts');
Route::delete('/deleteProducts/{id}', 'productController@deleteProducts');
Route::patch('/updateProducts/{id}', 'productController@updateProducts');

Route::get('/getMeals', 'productController@getMeals');

Route::get('/getEveryDay', 'productController@getEveryDay');

Route::get('/getBoxes', 'productController@getBoxes');

Route::get('/getSharing', 'productController@getSharing');

Route::get('/getPromotions', 'productController@getPromotions');

Route::get('/getSnacks', 'productController@getSnacks');

Route::get('/getMidNightDeals', 'productController@getMidNightDeals');

Route::get('/getHomoeKfc', 'productController@getHomoeKfc');
