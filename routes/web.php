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

Route::get('/', function () {
    return view('index');
});

Route::get('/', 'CarController@index')->name('index');
Route::post('/store', 'CarController@store')->name('store');
Route::get('/summary', 'CarController@summary')->name('summary');
Route::post('/completed', 'CarController@completed')->name('completed');
