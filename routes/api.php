<?php

use Illuminate\Http\Request;

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

Route::post('/user/', 'PagesController@createUser');
Route::put('/user/{id}', 'PagesController@updateUser');
Route::delete('/user/', 'PagesController@deleteUser');