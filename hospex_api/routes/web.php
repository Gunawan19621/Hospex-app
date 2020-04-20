<?php
use Illuminate\Support\Str;

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

// Generate Application Key
$router->get('/key', function ()
{
    return Str::random(32);
});


// exhibitors
$router->get('/exhibitors', 'ExhibitorsController@index');
$router->get('/exhibitors/{exhibitor}', 'ExhibitorsController@show');

// business matching
$router->post('/match-request', 'BusinessMatchingController@store');
$router->get('/match', 'BusinessMatchingController@index');
