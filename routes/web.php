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

Route::get('/login', function () {
    return view('auth.login');
})->middleware('guest');

Route::group(['namespace' => 'Frontend'], function() {
    Route::get('/', 'HomeController@index');
    Route::get('/tiket', 'HomeController@tiket');
    Route::post('/tiket', 'HomeController@store');
    Route::get('/tiket/{id}', 'HomeController@pdf');
    Route::get('/gallery', 'HomeController@spot');
    Route::get('/service', 'HomeController@service');
    Route::get('/testimoni', 'HomeController@testimoni');
});

Auth::routes();

Route::group(['middleware' => 'auth', 'namespace' => 'Admin'], function() {
    Route::get('/dashboard', 'AdminController@index');
    Route::post('/load', 'AdminController@load');
    Route::get('/order', 'OrderTiketController@index');
    Route::get('/notify', 'OrderTiketController@notify');
    Route::get('/notifikasi', 'OrderTiketController@notifikasi');
    Route::post('/order/{id}', 'OrderTiketController@put');
    Route::post('/delete/{id}', 'OrderTiketController@delete');
    Route::get('/list-order', 'OrderTiketController@listOrder');
    Route::get('/guest', 'OrderTiketController@guest');
    Route::get('/my-profile/{id}', 'AdminController@myAccount');
    Route::post('/my-profile/{id}', 'AdminController@Account');

});

Route::group(['prefix' => 'message', 'namespace' => 'Admin'], function() {
    Route::get('/', 'OrderTiketController@message');
    Route::post('/', 'OrderTiketController@sendMessage');
    Route::get('/list', 'OrderTiketController@listMessage');
    Route::post('/approve/{id}', 'OrderTiketController@approveMsg');
    Route::post('/block/{id}', 'OrderTiketController@blockMsg');
    Route::post('/delete/{id}', 'OrderTiketController@deleteMsg');

});

Route::group(['prefix' => 'pegawai', 'middleware' => 'auth', 'namespace' => 'Admin'], function() {
    Route::get('/', 'PegawaiController@index');
    Route::get('/list', 'PegawaiController@listPegawai');
    Route::get('/create', 'PegawaiController@create');
    Route::post('/create', 'PegawaiController@store');
    Route::get('/detail/{id}', 'PegawaiController@show');
    Route::post('/update/{id}', 'PegawaiController@update');
    Route::post('/delete/{id}', 'PegawaiController@delete');

});

Route::group(['prefix' => 'report', 'middleware' => 'auth', 'namespace' => 'Admin'], function() {
    Route::get('/jual', 'ReportController@index');
    Route::post('/jual', 'ReportController@pdfJual');
    Route::get('/pengunjung', 'ReportController@pengunjung');
    Route::get('/pengunjung-pdf', 'ReportController@pengunjungPdf');
});
