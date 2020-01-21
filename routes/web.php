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

Route::get('/','PagesController@index');

Route::resource('move','MoveController');

Route::resource('store','StoreController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//route for ajax dynmaic drop down menu
Route::get('/dynamic_fetch', 'DynamicDropdownController@fetch')->name('dynamic_fetch');