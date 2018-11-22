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
Route::get('/','HomeController@indexUser')->name('homeUser');
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
Route::delete('/camera/{id}/delete','CameraController@deletePermanent')->name('camera.delete-permanent');
Route::get('/camera/trash','CameraController@trash')->name('camera.trash');
Route::get('/camera/{id}/restore','CameraController@restore')->name('camera.restore');
Route::resource('camera','CameraController');
Route::get('/ajax/categories/search','CategoryController@ajaxSearch')->name('ajax.search');
Route::get('/ajax/brands/search','BrandController@ajaxSearch')->name('ajax-brand.search');
Route::get('/','BrandController@nampilinGambar');
Route::get('/{id}','BrandController@showGambar')->name('gambar');
//Route::get('/','BrandController@categoryShow');
Route::get('/admin','AdminController@admin')
    ->middleware('is_admin')->name('admin');