<?php

/*
|--------------------------------------------------------------------------
| Application API End Points
|--------------------------------------------------------------------------
|
| Here is where you can get all of the endpoints for this application.
|
 */

$router->get('/', function () {
    return view('welcome');
});


$router->group(['prefix' => 'api/v1'], function () use ($router) {
    $router->get('restaurants', ['as' => 'RestaurantList', 'uses' => 'Api\v1\RestaurantController@getList']);
});

$router->group(['prefix' => 'api/v5'], function () use ($router) {
    $router->get('restaurants', ['as' => 'RestaurantList', 'uses' => 'api\v5\RestaurantController@getList']);
});
