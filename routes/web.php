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


Route::get('/', 'IndexController@index');

Route::get('create-person', 'CreateUserController@create')->name('create-person');

Route::post('store-person','CreateUserController@store')->name('store-person');

Route::get('persons', 'PersonController@index');

Route::get('edit-person/{id}','PersonController@edit')->name('edit-person');

Route::put('update-person/{id}','PersonController@update')->name('update-person');

Route::delete('destroy-person/{id}','PersonController@destroy')->name('destroy-person');

