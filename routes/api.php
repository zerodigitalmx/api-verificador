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

$router->get('/ventas', 'ventaController@myfun');

//Endopoint Regresar articulos por like %
$router->group(['prefix' => 'articulos/clave'], function () use ($router) {
    $router->get('/', 'articleController@paging');
    $router->group(['prefix' => '{id}'], function () use ($router) {
        $router->get('/', 'articleController@getById');
    });
});

//Endopoint Regresar articulos por like %
$router->group(['prefix' => 'articulos/nombre'], function () use ($router) {
    $router->get('/', 'articleController@paging');
    $router->group(['prefix' => '{nombre}'], function () use ($router) {
        $router->get('/', 'articleController@funNom');
    });
});


//Endpoint retornar Articulos por clave especifica
$router->group(['prefix' => 'articulos'], function () use ($router) {
    $router->get('/', 'articleController@paging');
    $router->group(['prefix' => '{id}'], function () use ($router) {
        $router->get('/', 'articleController@funDos');
        $router->get('nombre', 'articleController@getByName');
    });
});
