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

Route::get('/', 'App\Http\Controllers\LoginController@login')->name('login');
Route::post('loginaksi', 'App\Http\Controllers\LoginController@loginaksi')->name('loginaksi');
Route::get('home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');
Route::get('logoutaksi', 'App\Http\Controllers\LoginController@logoutaksi')->name('logoutaksi')->middleware('auth');
