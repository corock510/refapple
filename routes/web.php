<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/web', function () {
    return view('welcome');
});

Route::get('/', 'App\Http\Controllers\IndexController@index')->name('/');
// Route::get('/search', 'App\Http\Controllers\IndexController@search')->name('search');
// Route::get('/get', 'App\Http\Controllers\IndexController@get')->name('get');;
