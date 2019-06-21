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

Route::get('/', 'HomepageController@index')->name('homepage');

Route::group(['prefix'    => 'login'], function () {
    Route::get('github', 'Auth\GithubController@redirectToProvider')->name('login_by_github');
    Route::get('github/callback', 'Auth\GithubController@handleProviderCallback')->name('login_by_github_callback');
});

Route::group([
    'prefix'    => 'account',
    'as'        => 'account.',
    'namespace' => 'Account',
    'middleware' => 'auth',
], function () {
    Route::get('/', 'AccountController@index')->name('index');
});

Route::group([
    'prefix' => 'courses',
    'as'     => 'courses.',
], function () {

    Route::get('/', 'CoursesController@index')->name('index');
    Route::get('{course}', 'CoursesController@show')->name('show');
});

Route::group([
    'prefix' => 'questions',
    'as'     => 'questions.',
], function () {

    Route::get('{question}', 'QuestionsController@show')->name('show');
    Route::post('', 'QuestionsController@answer')->name('answer');
    Route::get('process-answers', 'QuestionsController@processAnswers')->name('process-answers');
});
