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
    return view('layouts.app');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::delete('/category/{id}/delete','CategoryController@deletePermanent')->name('category.delete-permanent');
Route::get('/category/trash','CategoryController@trash')->name('category.trash');
Route::get('/category/{id}/restore','CategoryController@restore')->name('category.restore');
Route::resource('category', 'CategoryController');
Route::delete('/brand/{id}/delete','BrandController@deletePermanent')->name('brand.delete-permanent');
Route::get('/brand/trash','BrandController@trash')->name('brand.trash');
Route::get('/brand/{id}/restore','BrandController@restore')->name('brand.restore');
Route::resource('brand','BrandController');
Route::resource('user','UserController');
