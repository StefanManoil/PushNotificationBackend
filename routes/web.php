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

$router->group(['namespace' => '\App\Http\Controllers', 'prefix' => 'api'], function () use ($router) {
  $router->post('push_notif', ['uses' => 'PushNotificationController@sendPushNotification']);
});

$router->group(['namespace'] => '\App\Http\Controllers', 'prefix' => 'data', function () use ($router) {
  $router->post('scooter_data', ['uses' => '']);
});
