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
Route::get('/listing', 'ClassController@list')->name('class.listing');
Route::get('/class/{classId}', 'ClassController@showClass')->name('show.class');
Route::post('/class/join', 'ClassController@joinClass')->name('join.class');

Route::get('/assignment/submit/{id}', 'AssignmentController@submitAssignment')->name('assignment.submit');
Route::post('/assignment/submit/{id}', 'AssignmentController@saveAssignment')->name('submit.assignment.final');

Route::get('/assignment', 'AssignmentController@createAssignment')->name('create.assignment')->middleware(['auth', 'lecturer']);
Route::post('/assignment', 'AssignmentController@storeAssignment')->name('store.assignment')->middleware(['auth', 'lecturer']);

Route::get('/lecturer/home', 'LecturerController@index')->name('lecturer.home');
Route::get('/lecturer/assignments', 'LecturerController@index')->name('assignments');
Route::get('/lecturer/classes', 'LecturerController@classes')->name('lecturer.classes');
Route::post('/lecturer/createClass', 'LecturerController@createClass')->name('create.class');
Route::get('/lecturer/newclass', 'LecturerController@newClass')->name('new.class');



Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

use App\Models\SchoolClass;

Route::get('classy', function(){
    return SchoolClass::all();
});
