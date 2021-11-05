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

Route::get('/', 'App\Http\Controllers\PagesController@getHome')->name('home');

Route::get('/product', 'App\Http\Controllers\PagesController@getProduct')->name('product');

Route::get('/product/{id}', 'App\Http\Controllers\PagesController@getProductDetail');

Route::get('/login', 'App\Http\Controllers\PagesController@getLogin')->name("login");
Route::post('/login', 'App\Http\Controllers\PagesController@postLogin');

Route::post('/search', 'App\Http\Controllers\PagesController@postSearch');

Route::get('/typeProduct/{id}', 'App\Http\Controllers\PagesController@getTypeProduct')->name("typeProduct");
