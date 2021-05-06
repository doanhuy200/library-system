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

Route::get('/', 'BorrowController@index')->name('index');
Route::get('/create/{id}', 'BorrowController@create')->name('create');
Route::post('/store/{id}', 'BorrowController@store')->name('store');
Route::get('/overdue', 'BorrowController@overdue')->name('overdue');
Route::put('/return/{id}', 'BorrowController@returnBook')->name('return');
