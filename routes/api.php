<?php

use Illuminate\Http\Request;
use Illuminate\Routing\Router;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
* Snippet for a quick route reference
*/
Route::get('/', function (Router $router) {
    return collect($router->getRoutes()->getRoutesByMethod()["GET"])->map(function($value, $key) {
        return url($key);
    })->values();   
});

Route::resource('courses', 'CourseAPIController', [
    'only' => ['index', 'show', 'store', 'update', 'delete']
]);

Route::resource('questions', 'QuestionAPIController', [
    'only' => ['index', 'show', 'store', 'update', 'delete']
]);

Route::resource('answers', 'AnswersAPIController', [
    'only' => ['index', 'show', 'store', 'update', 'delete']
]);

Route::resource('resources', 'ResourceAPIController', [
    'only' => ['index', 'show', 'store', 'update', 'delete']
]);

Route::resource('resourceables', 'ResourceableAPIController', [
    'only' => ['index', 'show', 'store', 'update', 'delete']
]);

Route::resource('certificates', 'CertificateAPIController', [
    'only' => ['index', 'show', 'store', 'update', 'delete']
]);

Route::resource('users', 'UserAPIController', [
    'only' => ['index', 'show', 'store', 'update', 'delete']
]);