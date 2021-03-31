<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->get('/monedas', 'monedaController@paging');

$router->get('/ventas', 'ventaController@paging');

$router->group(['prefix' => 'articulos'], function () use ($router) {
    $router->get('{id}', 'articleController@getByClave');
    $router->get('/clave/{id}', 'articleController@getLikeClave');
    $router->get('/nombre/{nombre}', 'articleController@getLikeName');
});
