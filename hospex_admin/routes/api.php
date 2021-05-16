<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// exhibitors
$router->get('exhibitors', 'Api\ExhibitorsController@index');
$router->get('exhibitors/{exhibitor}', 'Api\ExhibitorsController@show');

// business matching
$router->post('match-request', 'Api\BusinessMatchingController@store');
$router->post('match-approve/{match}', 'Api\BusinessMatchingController@approve');
$router->post('match-reject/{match}', 'Api\BusinessMatchingController@reject');
$router->get('list-business-matching/{type}/{id}/{status}', 'Api\BusinessMatchingController@index');

$router->get('event', 'Api\EventController@index');

// schedule
$router->get('schedules', 'Api\SchedulesController@index');
$router->get('schedules/{id}', 'Api\SchedulesController@show');

$router->post('register', 'Api\AuthController@register');
$router->post('login', 'Api\AuthController@login');
$router->post('logout', 'Api\AuthController@logout');
$router->post('update-device-token', 'Api\AuthController@updateDeviceToken');
$router->post('forgot-password', 'Api\AuthController@forgotPassword');
$router->get('user/{id}','Api\AuthController@getUser');
$router->post('user/change-password','Api\AuthController@changePassword');
$router->post('user/change-profile','Api\AuthController@changeProfile');
$router->post('image/upload','Api\ImageController@uploadImage');

// available schedule
$router->get('available-schedule/{exhibitor}','Api\AvailableController@index');