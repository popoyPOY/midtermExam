<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});


$router->group(['prefix' => 'api'], function($router) {
    $router->get('users/browse', 'TeacherController@showTeachers');

    $router->post('users/create', 'TeacherController@createTeacher');

    $router->get('users/search/{id}', 'TeacherController@searchTeacher');

    $router->delete('users/delete/{id}', 'TeacherController@deleteTeacher');
    
    $router->patch('users/update/{id}', 'TeacherController@updateTeacher');
});
