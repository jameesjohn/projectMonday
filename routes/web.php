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
    return view('welcome');
});

Route::get('/class', function () {
    return view('class');
});

Route::get('/listing', 'ClassController@list');
Route::post('/class/join', 'ClassController@joinClass')->name('join.class');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
