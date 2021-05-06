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

Route::get('/', 'ReaderController@index')->name('index');
Route::get('/create', 'ReaderController@create')->name('create');
Route::post('/store', 'ReaderController@store')->name('store');
Route::get('/edit/{reader}', 'ReaderController@edit')->name('edit');
Route::put('/update/{reader}', 'ReaderController@update')->name('update');
