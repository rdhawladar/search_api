<?php

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

 $router->get('/', function () {
    return view('welcome');
});

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('movie-list', ['as' => 'MovieList', 'uses' => 'MovieController@getList']);
    $router->get('movie/{slug}', ['as' => 'MovieDetails', 'uses' => 'MovieController@getDetails']);
    $router->get('user-count', ['as' => 'UserCount', 'uses' => 'MovieController@userCount']);
});
