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

$router->get('/', 'controller@index');

$router->get('/ventas', 'controller@myfun');

//Endopoint Regresar articulos por like %
$router->group(['prefix' => 'articulos/clave'], function() use($router){
    $router->get('/', 'articles@paging');
    $router->group(['prefix' => '{id}'], function() use($router){
        $router->get('/', 'articles@getById'); 
    });
});

//Endopoint Regresar articulos por like %
$router->group(['prefix' => 'articulos/nombre'], function() use($router){
    $router->get('/', 'articles@paging');
    $router->group(['prefix' => '{nombre}'], function() use($router){
        $router->get('/', 'articles@funNom'); 
    });
});


//Endpoint retornar Articulos por clave especifica
$router->group(['prefix' => 'articulos'], function() use($router){
    $router->get('/', 'articles@paging');
    $router->group(['prefix' => '{id}'], function() use($router){
        $router->get('/', 'articles@funDos');
        $router->get('nombre', 'articles@getByName');
    });
});




