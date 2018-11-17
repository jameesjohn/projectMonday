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
// submit assignments route
Route::get('/assignment/submit/{id}', 'AssignmentController@submitAssignment')->name('assignment.submit');
Route::post('/assignment/submit/{id}', 'AssignmentController@saveAssignment')->name('submit.assignment.final');
Route::get('/information', 'NotificationController@index')->name('information');
Route::get('lecturer/information/create', 'NotificationController@create')->name('information.create');
Route::post('lecturer/information/create', 'NotificationController@store');
Route::get('lecturer/information/{id}/edit', 'NotificationController@edit')->name('edit.notification');
Route::put('lecturer/information/{id}/edit', 'NotificationController@update');
Route::post('lecturer/information/{id}/delete', 'NotificationController@destroy');
Route::get('/information/{id}', 'NotificationController@show');

// Lecturers Routes
Route::get('/lecturer/home', 'LecturerController@index')->name('lecturer.home');
// class routes
Route::get('/lecturer/classes', 'LecturerController@classes')->name('lecturer.classes');
Route::get('/lecturer/newclass', 'LecturerController@newClass')->name('new.class');
Route::post('/lecturer/createClass', 'LecturerController@createClass')->name('create.class');
Route::post('/lecturer/class/{id}/delete', 'LecturerController@deleteClass')->name('delete');
Route::get('/lecturer/class/{id}/students', 'LecturerController@seeStudentsInClass')->name('see.class.students');


// create assignment -- Lecturer
Route::get('lecturer/assignment/create', 'AssignmentController@createAssignment')->name('create.assignment')->middleware(['auth', 'lecturer']);
Route::post('lecturer/assignment/create', 'AssignmentController@storeAssignment')->name('store.assignment')->middleware(['auth', 'lecturer']);
Route::get('/lecturer/assignments/{classId}', 'AssignmentController@viewAssignmentsPerClass')->name('show.assignment')->middleware(['auth', 'lecturer']);;
Route::get('/lecturer/assignments/{classId}/edit', 'AssignmentController@editClassAssignments')->name('edit.assignment')->middleware(['auth', 'lecturer']);;
Route::put('/lecturer/assignments/{classId}/edit', 'AssignmentController@updateClassAssignments')->name('edit.assignment')->middleware(['auth', 'lecturer']);;
Route::get('lecturer/assignments/submitted/{assignmentId}', 'AssignmentController@viewAssignmentSubmissions')->name('see.submission')->middleware(['auth', 'lecturer']);;
Route::post('/assignments/{assignmentId}/delete', 'AssignmentController@deleteAssignment')->middleware(['auth', 'lecturer']);;


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

