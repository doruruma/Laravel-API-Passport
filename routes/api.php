<?php


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/login', 'API\UserController@login')->name('API.login');
Route::get('/register', 'API\UserController@register')->name('API.register');

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/students', 'API\StudentController@fetch');
});
