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

Route::get('/class/list', 'ClassController@myClasses')->name('my.class');
Route::get('/listing', 'ClassController@list');
Route::get('/class/{classId}', 'ClassController@showClass')->name('show.class');
Route::post('/class/join', 'ClassController@joinClass')->name('join.class');

Route::get('/assignment/submit/{id}', 'AssignmentController@submitAssignment')->name('assignment.submit');
Route::post('/assignment/submit/{id}', 'AssignmentController@submitAssignment')->name('submit.assignment.final');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
