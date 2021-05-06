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

Route::prefix('reader')->as('reader.')->group(base_path('routes/reader/index.php'));
Route::prefix('book')->as('book.')->group(base_path('routes/book/index.php'));
Route::prefix('borrow')->as('borrow.')->group(base_path('routes/borrow/index.php'));
Route::get('/', 'DashboardController@dashboard')->name('dashboard');
