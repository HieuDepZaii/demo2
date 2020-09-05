<?php

use Illuminate\Support\Facades\Route;

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

// frontend

Route::get('/','HomeController@index')->name('home');

//backend
Route::get('/admin/login','AdminController@login')->name('admin.login');
Route::get('/admin/dashboard','AdminController@show_dashboard')->name('admin.show_dashboard');
Route::post('/login','AdminController@check_login')->name('admin.check_login');
Route::get('/admin/logout','AdminController@logout')->name('admin.logout');

//danh mục sản phẩm (category_product)
Route::get('admin/add_category_product','CategoryProduct@add_category')->name('CategoryProduct.add_category');
Route::get('admin/all_category_product','CategoryProduct@all_category')->name('CategoryProduct.all_category');
Route::post('/admin/save_category_product','CategoryProduct@save_category_product')->name('CategoryProduct.save_category');
Route::get('/admin/like_category_product/{id}','CategoryProduct@like_category_product')->name('CategoryProduct.like');
Route::get('/admin/unlike_category_product/{id}','CategoryProduct@unlike_category_product')->name('CategoryProduct.unlike');
