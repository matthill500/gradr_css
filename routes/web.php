<?php
# @Date:   2019-11-21T07:44:46+00:00
# @Last modified time: 2019-11-28T12:47:31+00:00




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


Route::get('/', 'PageController@welcome')->name('welcome');
Route::get('/about', 'PageController@about')->name('about');


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin/home', 'Admin\HomeController@index')->name('admin.home');
Route::get('/user/home', 'User\HomeController@index')->name('user.home');

Route::get('/admin/questions', 'Admin\QuestionController@index')->name('admin.questions.index');
Route::get('/admin/deleteRequests', 'Admin\QuestionController@deleteRequests')->name('admin.questions.deleteRequests');
Route::get('/admin/questions/create', 'Admin\QuestionController@create')->name('admin.questions.create');
Route::get('/admin/questions/{id}', 'Admin\QuestionController@show')->name('admin.questions.show');
Route::post('/admin/questions/store', 'Admin\QuestionController@store')->name('admin.questions.store');
Route::get('/admin/questions/{id}/edit', 'Admin\QuestionController@edit')->name('admin.questions.edit');
Route::post('/admin/questions/{id}', 'Admin\QuestionController@update')->name('admin.questions.update');
Route::delete('/admin/questions/{id}', 'Admin\QuestionController@destroy')->name('admin.questions.destroy');

Route::get('/admin/students', 'Admin\StudentController@index')->name('admin.students.index');
Route::get('/admin/students/create', 'Admin\StudentController@create')->name('admin.students.create');
Route::get('/admin/students/{id}/show', 'Admin\StudentController@show')->name('admin.students.show');
Route::post('/admin/students/store', 'Admin\StudentController@store')->name('admin.students.store');
Route::get('/admin/students/{id}/edit', 'Admin\StudentController@edit')->name('admin.students.edit');
Route::put('/admin/students/{id}', 'Admin\StudentController@update')->name('admin.students.update');
Route::delete('/admin/students/{id}', 'Admin\StudentController@destroy')->name('admin.students.destroy');

Route::get('/user/questions', 'User\QuestionController@index')->name('user.questions.index');
Route::get('/user/questions/create', 'User\QuestionController@create')->name('user.questions.create');
Route::get('/user/questions/{id}', 'User\QuestionController@show')->name('user.questions.show');
Route::post('/user/questions/store', 'User\QuestionController@store')->name('user.questions.store');
Route::get('/user/questions/{id}/edit', 'User\QuestionController@edit')->name('user.questions.edit');
Route::post('/user/questions/{id}', 'User\QuestionController@update')->name('user.questions.update');
Route::put('/user/questions/{id}', 'User\QuestionController@requestDelete')->name('user.questions.requestDelete');



Route::get('/user/answers/{id}', 'User\AnswerController@index')->name('user.answers.index');
Route::get('/user/answers/create/{id}', 'User\AnswerController@create')->name('user.answers.create');
//Route::get('/user/answers/{id}', 'User\AnswerController@show')->name('user.answers.show');
Route::post('/user/answers/store/{id}', 'User\AnswerController@store')->name('user.answers.store');
Route::get('/user/answers/{id}/edit', 'User\AnswerController@edit')->name('user.answers.edit');
Route::post('/user/answers/{id}', 'User\AnswerController@update')->name('user.answers.update');
Route::put('/user/answers/{id}', 'User\AnswerController@requestDelete')->name('user.answers.requestDelete');
