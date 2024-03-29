<?php

Route::get('/', 'HomepageController@index')->name('homepage');

Route::group([
    'prefix' => 'inloggen',
    'as'     => 'auth.',
], function () {

    Route::get('/', 'LoginController@show')->name('login');

    Route::get('github', 'Auth\GithubController@redirectToProvider')->name('login_by_github');
    Route::get('github/callback', 'Auth\GithubController@handleProviderCallback')->name('login_by_github_callback');
    Route::get('logout', 'Auth\GithubController@logout')->name('logout');
});

Route::group([
    'prefix'     => 'account',
    'as'         => 'account.',
    'namespace'  => 'Account',
    'middleware' => 'auth',
], function () {
    Route::get('/', 'AccountController@index')->name('index');
    Route::get('/test', 'TestController@index')->name('test');
});

Route::group([
    'prefix'     => 'courses',
    'as'         => 'courses.',
    'middleware' => 'auth',
], function () {

    Route::get('/', 'CoursesController@index')->name('index');
    Route::get('{course}', 'CoursesController@show')->name('show');
    Route::get('{course}/success', 'CoursesController@success')->name('success');
    Route::get('{course}/failure', 'CoursesController@failure')->name('failure');
});

Route::group([
    'prefix' => 'questions',
    'as'     => 'questions.',
], function () {

    Route::get('{question}', 'QuestionsController@show')->name('show');
    Route::post('/', 'QuestionsController@answer')->name('answer');
    Route::get('process-answers/{course}', 'QuestionsController@processAnswers')->name('process-answers');
});
