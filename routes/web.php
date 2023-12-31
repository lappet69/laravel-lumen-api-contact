<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Http\Controllers\ContactController;
use Illuminate\Http\Request;

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

    $router->get('/get-all-contact', 'ContactController@index');
    $router->post('/add-contact', 'ContactController@store');
    $router->get('/get-contact/{id}', 'ContactController@show');
    $router->delete('/delete-contact/{id}', 'ContactController@destroy');
    $router->put('/update-contact/{id}', 'ContactController@update');
});
