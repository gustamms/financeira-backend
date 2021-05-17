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

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->post('register', 'AuthController@register');

    $router->post('login', 'AuthController@login');

    $router->get('type-transactions', 'TypeTransactionsController@index');
    $router->get('type-transactions/{id}', 'TypeTransactionsController@show');
    $router->put('type-transactions/{id}', 'TypeTransactionsController@update');
    $router->post('type-transactions', 'TypeTransactionsController@store');
    $router->delete('type-transactions/{id}', 'TypeTransactionsController@destroy');

    $router->get('type-person', 'TypePersonController@index');
    $router->get('type-person/{id}', 'TypePersonController@show');
    $router->put('type-person/{id}', 'TypePersonController@update');
    $router->post('type-person', 'TypePersonController@store');
    $router->delete('type-person/{id}', 'TypePersonController@destroy');

    $router->get('transactions/{id}', 'TransactionsController@showEspecificUser');
    $router->post('transactions', 'TransactionsController@store');
});
