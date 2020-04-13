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


Route::get('/', 'HomeController@index')->name('HomeController.home');

Route::get('/login', 'AuthController@login')->name('AuthController.login');
Route::post('/login', 'AuthController@postLogin')->name('AuthController.postLogin');
Route::post('/register', 'AuthController@postRegister')->name('AuthController.postRegister');
Route::get('/register', 'AuthController@register')->name('AuthController.register');
Route::get('/logout', 'AuthController@logout')->name('AuthController.logout');