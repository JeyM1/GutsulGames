<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', 'MainController@index')->name('main');
Route::get('/aboutus', 'MainController@aboutus')->name('aboutus');
Route::get('/catalog', 'MainController@catalog')->name('catalog');
Route::get('/users/{user}', 'MainController@users')->name('users');
Route::get('/games/{gameid}', 'MainController@games')->name('games');
Route::get('/checkout', 'MainController@checkout')->name('checkout');



//Route::get('/home', 'HomeController@index')->name('home');
