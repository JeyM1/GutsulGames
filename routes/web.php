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

/* Main routes */
Route::get('/', 'MainController@index')->name('main');
Route::get('/aboutus', 'MainController@aboutus')->name('aboutus');
Route::get('/catalog', 'MainController@catalog')->name('catalog');
Route::get('/users/{user}', 'MainController@users')->name('users');
Route::get('/games/{gameid}', 'MainController@games')->name('games');

/* Cart routes */
Route::get('/checkout', 'CartController@checkout')->name('checkout');
Route::get('/checkout/confirm', 'CartController@confirm_checkout')->name('confirm');
Route::get('/add_game/{gameid}', 'CartController@addToUserCart')->name('add_game');
Route::get('/remove_game/{gameid}', 'CartController@removeFromUserCart')->name('remove_game');

/* Games routes */
Route::get('/play/{id}', 'GameController@play_online')->name('play');
Route::post('/download/{id}', 'GameController@download')->name('download');

/* Admin panel routes */
Route::group(['middleware' => 'web'/*, 'prefix' => config('backpack.base.route_prefix')*/], function () {
    Route::auth();
    Route::get(config('backpack.base.route_prefix')."/logout", 'Auth\LoginController@logout');
});
