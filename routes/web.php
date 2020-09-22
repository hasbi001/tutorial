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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/','ArtikelController@index')->name('artikel');
Route::get('/artikel/create','ArtikelController@create')->name('artikel.create');
Route::post('/artikel/create','ArtikelController@store')->name('artikel.store');
Route::get('/artikel/view/{id}','ArtikelController@show')->name('artikel.view');
Route::get('/artikel/update/{id}','ArtikelController@edit')->name('artikel.edit');
Route::post('/artikel/update/{id}','ArtikelController@update')->name('artikel.update');
