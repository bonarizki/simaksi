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



Auth::routes();

Route::get('/','generalController@index')->name('home');
Route::get('/simaksi','generalController@simaksi')->name('simaksi');
Route::get('/registrasi','generalController@registrasi')->name('registrasi');
Route::get('/login','generalController@login')->name('login');
Route::get('/daftarSimaksi','simaksiController@daftarSimaksi')->name('daftar');
Route::post('/prosesDaftar','simaksiController@ProsesDaftar')->name('ProsesDaftar');
Route::get('/pembayaranSimaksi','simaksiController@bayarSimaksi')->name('BayarSimaksi');
Route::post('/bayaranSimaksi','simaksiController@prosesBayarSimaksi')->name('ProsesBayarSimaksi');
Route::get('/HistorySimaksi','simaksiController@HistorySimaksi')->name('History');
Route::get('/DetailSimaksi/{id}','simaksiController@detailSimaksi')->name('detail');
// Route::get('/home', 'HomeController@index')->name('home');
