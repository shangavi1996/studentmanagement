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

Route::get('/','UserController@showwelcome');

Auth::routes();
Route::post('/admin_register', 'UserController@admin_register');

Route::get('/show_admin', 'UserController@show_admin');


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/advertisement', 'AdController@index')->name('advertisement.index');
Route::post('upload/store', 'AdController@store');
//Route::resource('hello', 'TeacherController');
route::post('/teacher','TeacherController@store')->name('teachers.store');
Route::get('/teacher', 'TeacherController@index')->name('teachers.index');
Route::get('/teacher/create', 'TeacherController@create')->name('teachers.create');
Auth::routes(['verify' => true]);
Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');
Route::post('/admission/search', 'AdmissionController@search')->name('admission.search');
Route::get('/home','HomeController@index')->middleware('verified');
Route::resource('courses', 'CourseController');
Route::resource('admissions', 'AdmissionController');
Route::get('{level}/{course}/{file}/file-download',['as'=>'study_file_download','uses'=>'StudyMaterialcontroller@Download']); 
Route::get('{level}/{course}/{file}/{id}/delete',['as'=>'delete_file_download','uses'=>'StudyMaterialcontroller@delete']); 
Route::resource('terms', 'TermController');
Route::get('storage/teachers/{id}/{filename}/', 'ImageController@displayImage')->name('image.displayImage');
Route::get('storage/students/{id}/{filename}/', 'ImageController@displaystudentsImage')->name('image.displaystudents');
Route::get('storage/user/', 'ImageController@displayuser')->name('image.displayuser');



