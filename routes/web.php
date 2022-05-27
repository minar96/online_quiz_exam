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



Auth::routes([
	'reset'=>false,
	'verify'=>false
]);

//fontend route
Route::get('/home', 'HomeController@index')->name('home');
Route::get('user/quiz/{quizId}', 'ExamControllers@getQuizQuestions')->middleware('auth');
Route::post('quiz/create', 'ExamControllers@postQuiz')->middleware('auth');
Route::get('result/user/{userId}/quiz/{quizId}', 'ExamControllers@viewResult')->middleware('auth');


//admin route
Route::group(['middleware'=>'isAdmin'],function(){
	//dashboard route
	Route::get('/', function () {
    return view('admin.index');
});

	Route::resource('quiz', 'QuizControllers');
	Route::resource('question', 'QuestionControllers');
	Route::resource('user', 'UserControllers');
	Route::get('quiz/{id}/questions', 'QuizControllers@question')->name('quiz.question');

	//exam route
	Route::get('exam/assign', 'ExamControllers@create')->name('assign.exam');
	Route::post('exam/assign', 'ExamControllers@assignExam')->name('exam.assign');
	Route::get('exam/user', 'ExamControllers@userExam')->name('view.exam');
	Route::post('exam/remove', 'ExamControllers@removeExam')->name('exam.remove');

	//particular user particular result route
	Route::get('result', 'ExamControllers@result')->name('result');
	Route::get('result/{userId}/{quizId}', 'ExamControllers@userQuizResult');

});





