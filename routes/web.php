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


Route::get('/categories-products/{category}', 'CategoryController@categoryProduct')->name('categories.products');
Route::resource('/categories', 'CategoryController');

Route::resource('/products', 'ProductController');

Route::get('/', 'WarrantyProductController@index');
Route::resource('/warranty-products', 'WarrantyProductController');

Route::get('/customer', function () {
    return view('/customer');
});

//Extra preview db design
Route::get('/db-design', function () {
    return view('db-design');
})->name('db.design');
