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

Route::get('/user/courses/{id}', 'User\CoursesController@index')->name('user.courses');
Route::get('/user/modules/{id}', 'User\ModulesController@index')->name('user.modules');
Route::get('/user/base/{id}', 'User\BaseController@index')->name('user.base');

// Route::get('/user/profile', 'User\ProfileController@index')->name('user.profile');
Route::get('/user/{name}/profile', 'User\ProfileController@viewUserProfile')->name('user.profile');
Route::get('/user/profile', 'User\ProfileController@index')->name('user.myProfile');
Route::get('/user/editProfile', 'User\ProfileController@edit')->name('user.editProfile');
Route::put('/user/updateProfile', 'User\ProfileController@update')->name('user.updateProfile');

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
Route::delete('/admin/questions/{id}/college', 'Admin\QuestionController@destroyCollege')->name('admin.questions.destroyCollege');
Route::delete('/admin/questions/{id}/course', 'Admin\QuestionController@destroyCourse')->name('admin.questions.destroyCourse');
Route::delete('/admin/questions/{id}/module', 'Admin\QuestionController@destroyModule')->name('admin.questions.destroyModule');
Route::delete('/admin/questions/{id}/general', 'Admin\QuestionController@destroyGeneral')->name('admin.questions.destroyGeneral');

Route::get('/admin/students', 'Admin\StudentController@index')->name('admin.students.index');
Route::get('/admin/students/create', 'Admin\StudentController@create')->name('admin.students.create');
Route::get('/admin/students/{id}/show', 'Admin\StudentController@show')->name('admin.students.show');
Route::post('/admin/students/store', 'Admin\StudentController@store')->name('admin.students.store');
Route::get('/admin/students/{id}/edit', 'Admin\StudentController@edit')->name('admin.students.edit');
Route::put('/admin/students/{id}', 'Admin\StudentController@update')->name('admin.students.update');
Route::delete('/admin/students/{id}', 'Admin\StudentController@destroy')->name('admin.students.destroy');

Route::get('/admin/colleges', 'Admin\CollegeController@index')->name('admin.colleges.index');
Route::get('/admin/colleges/create', 'Admin\CollegeController@create')->name('admin.colleges.create');
Route::get('/admin/colleges/{id}/show', 'Admin\CollegeController@show')->name('admin.colleges.show');
Route::post('/admin/colleges/store', 'Admin\CollegeController@store')->name('admin.colleges.store');
Route::get('/admin/colleges/{id}/edit', 'Admin\CollegeController@edit')->name('admin.colleges.edit');
Route::put('/admin/colleges/{id}', 'Admin\CollegeController@update')->name('admin.colleges.update');
Route::delete('/admin/colleges/{id}', 'Admin\CollegeController@destroy')->name('admin.colleges.destroy');

Route::get('/admin/courses', 'Admin\CourseController@index')->name('admin.courses.index');
Route::get('/admin/courses/create', 'Admin\CourseController@create')->name('admin.courses.create');
Route::get('/admin/courses/{id}/show', 'Admin\CourseController@show')->name('admin.courses.show');
Route::post('/admin/courses/store', 'Admin\CourseController@store')->name('admin.courses.store');
Route::get('/admin/courses/{id}/edit', 'Admin\CourseController@edit')->name('admin.courses.edit');
Route::put('/admin/courses/{id}', 'Admin\CourseController@update')->name('admin.courses.update');
Route::delete('/admin/courses/{id}', 'Admin\CourseController@destroy')->name('admin.courses.destroy');

Route::get('/admin/modules', 'Admin\ModuleController@index')->name('admin.modules.index');
Route::get('/admin/modules/create', 'Admin\ModuleController@create')->name('admin.modules.create');
Route::get('/admin/modules/{id}/show', 'Admin\ModuleController@show')->name('admin.modules.show');
Route::post('/admin/modules/store', 'Admin\ModuleController@store')->name('admin.modules.store');
Route::get('/admin/modules/{id}/edit', 'Admin\ModuleController@edit')->name('admin.modules.edit');
Route::put('/admin/modules/{id}', 'Admin\ModuleController@update')->name('admin.modules.update');
Route::delete('/admin/modules/{id}', 'Admin\ModuleController@destroy')->name('admin.modules.destroy');

Route::get('/user/questions', 'User\QuestionController@index')->name('user.questions.index');
Route::get('/user/questions/create', 'User\QuestionController@create')->name('user.questions.create');
Route::get('/user/questionsCollege/{id}', 'User\QuestionController@showCollege')->name('user.questions.showCollege');
Route::get('/user/questionsCourse/{id}', 'User\QuestionController@showCourse')->name('user.questions.showCourse');
Route::get('/user/questionsModule/{id}', 'User\QuestionController@showModule')->name('user.questions.showModule');
Route::get('/user/questionsGeneral/{id}', 'User\QuestionController@showGeneral')->name('user.questions.showGeneral');
Route::post('/user/questions/store', 'User\QuestionController@store')->name('user.questions.store');
Route::get('/user/questions/{id}/editCollege', 'User\QuestionController@editCollege')->name('user.questions.editCollege');
Route::get('/user/questions/{id}/editCourse', 'User\QuestionController@editCourse')->name('user.questions.editCourse');
Route::get('/user/questions/{id}/editModule', 'User\QuestionController@editModule')->name('user.questions.editModule');
Route::get('/user/questions/{id}/editGeneral', 'User\QuestionController@editGeneral')->name('user.questions.editGeneral');
Route::post('/user/questions/{id}/updateCollege', 'User\QuestionController@updateCollege')->name('user.questions.updateCollege');
Route::post('/user/questions/{id}/updateCourse', 'User\QuestionController@updateCourse')->name('user.questions.updateCourse');
Route::post('/user/questions/{id}/updateModule', 'User\QuestionController@updateModule')->name('user.questions.updateModule');
Route::post('/user/questions/{id}/updateGeneral', 'User\QuestionController@updateGeneral')->name('user.questions.updateGeneral');

Route::put('/user/questions/{id}/college', 'User\QuestionController@requestDeleteCollege')->name('user.questions.requestDeleteCollege');
Route::put('/user/questions/{id}/course', 'User\QuestionController@requestDeleteCourse')->name('user.questions.requestDeleteCourse');
Route::put('/user/questions/{id}/module', 'User\QuestionController@requestDeleteModule')->name('user.questions.requestDeleteModule');
Route::put('/user/questions/{id}/general', 'User\QuestionController@requestDeleteGeneral')->name('user.questions.requestDeleteGeneral');

Route::get('/user/questions/redirect/{type}/{id}', 'User\QuestionController@redirect')->name('user.questions.redirect');



Route::get('/user/{type}/answers/{id}', 'User\AnswerController@index')->name('user.answers.index');
Route::get('/user/answers/{type}/create/{id}', 'User\AnswerController@create')->name('user.answers.create');
Route::get('/user/answersCollege/{id}', 'User\AnswerController@showCollege')->name('user.answers.showCollege');
Route::get('/user/answersCourse/{id}', 'User\AnswerController@showCourse')->name('user.answers.showCourse');
Route::get('/user/answersModule/{id}', 'User\AnswerController@showModule')->name('user.answers.showModule');
Route::get('/user/answersGeneral/{id}', 'User\AnswerController@showGeneral')->name('user.answers.showGeneral');
Route::post('/user/answers/{type}/store/{id}', 'User\AnswerController@store')->name('user.answers.store');
Route::get('/user/answers/editGeneral/{id}', 'User\AnswerController@editGeneral')->name('user.answers.editGeneral');
Route::get('/user/answers/editCollege/{id}', 'User\AnswerController@editCollege')->name('user.answers.editCollege');
Route::get('/user/answers/editCourse/{id}', 'User\AnswerController@editCourse')->name('user.answers.editCourse');
Route::get('/user/answers/editModule/{id}', 'User\AnswerController@editModule')->name('user.answers.editModule');
Route::post('/user/answers/{id}/updateGeneral', 'User\AnswerController@updateGeneral')->name('user.answers.updateGeneral');
Route::post('/user/answers/{id}/updateCollege', 'User\AnswerController@updateCollege')->name('user.answers.updateCollege');
Route::post('/user/answers/{id}/updateCourse', 'User\AnswerController@updateCourse')->name('user.answers.updateCourse');
Route::post('/user/answers/{id}/updateModule', 'User\AnswerController@updateModule')->name('user.answers.updateModule');



Route::put('/user/{type}/answers/{id}/deleteModule', 'User\AnswerController@destroyModule')->name('user.answers.destroyModule');
Route::put('/user/{type}/answers/{id}/deleteGeneral', 'User\AnswerController@destroyGeneral')->name('user.answers.destroyGeneral');
Route::put('/user/{type}/answers/{id}/deleteCollege', 'User\AnswerController@destroyCollege')->name('user.answers.destroyCollege');
Route::put('/user/{type}/answers/{id}/deleteCourse', 'User\AnswerController@destroyCourse')->name('user.answers.destroyCourse');

Route::put('/user/questionsCourse/{id}/course', 'User\QuestionController@voteCourse')->name('user.questions.voteCourse');

//Route::get('/user/answers/{id}/edit', 'User\AnswerController@edit')->name('user.answers.edit');
//Route::post('/user/answers/{id}', 'User\AnswerController@update')->name('user.answers.update');
//Route::put('/user/answers/{id}', 'User\AnswerController@requestDelete')->name('user.answers.requestDelete');
