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

Route::post('/login', 'API\AuthController@login')->name('API.login');
Route::post('/register', 'API\AuthController@register')->name('API.register');
Route::get('/logout', 'API\AuthController@logout')->name('API.logout');

Route::get('/unauthorized', 'API\AuthController@unauthorized')->name('API.unauthorized');

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/students', 'API\StudentController@fetch');
});
