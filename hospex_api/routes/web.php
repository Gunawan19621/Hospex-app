<?php
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;

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
$router->put('/match-request/{ match }/{ type }', 'BusinessMatchingController@update');
$router->post('/match-approve/{ match }', 'BusinessMatchingController@approve');
$router->get('/list-business-matching/{type}/{id}/{status}', 'BusinessMatchingController@index');
$router->get('/match-success/{ id }', 'BusinessMatchingController@updateStatusMeeting');

$router->get('/matchExhibitor', 'BusinessMatchingController@list_matching');
$router->get('/matchVisitor', 'BusinessMatchingController@list_matching');

// schedule
$router->get('/schedules', 'SchedulesController@index');
$router->get('/schedules/{id}', 'SchedulesController@show');

$router->get('/event', 'EventController@index');

$router->post('/register', 'AuthController@register');
$router->post('/login', 'AuthController@login');
$router->get('/user/{id}','AuthController@getUser');
$router->post('/user/change-password','AuthController@changePassword');
$router->post('/user/change-profile','AuthController@changeProfile');

$router->post('/image/upload','ImageController@uploadImage');
$router->get('/image/logo/{exhibitor}','ImageController@logo');

// available schedule
$router->get('/available-schedule/{exhibitor}','AvailableController@index');