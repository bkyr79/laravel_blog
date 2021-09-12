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

Route::match(['get', 'post'], '/','App\Http\Controllers\HomeController@index');

Route::match(['get', 'post'], '/search','App\Http\Controllers\HomeController@search');

Route::get('/create', 'App\Http\Controllers\CreatePostController@index');

Route::post('/post_submit', 'App\Http\Controllers\CreatePostController@postSubmit');

Route::get('/category_list', 'App\Http\Controllers\CategoryController@categoryList');

Route::get('/category_detail', 'App\Http\Controllers\CategoryController@categoryDetail');

Route::get('/delete', 'App\Http\Controllers\EditAndDeleteController@delete');

Route::get('/edit', 'App\Http\Controllers\EditAndDeleteController@edit');

Route::post('/edit_done', 'App\Http\Controllers\EditAndDeleteController@editDone');