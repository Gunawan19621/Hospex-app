<?php
use Illuminate\Support\Str;
use App\Helpers\GetEvent;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Hash;

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


// schedule
$router->get('/schedules', 'SchedulesController@index');
$router->get('/schedules/{id}', 'SchedulesController@show');

$router->get('/event', function () {
    return GetEvent::GetEvent();
});


$router->post('/register', 'AuthController@register');
$router->post('/login', 'AuthController@login');
$router->get('/read', function(){
    $user = User::whereHasMorph(
            'usertable',
            ['App\EventExhibitor', 'App\Visitor'],
            function (Builder $query, $type) {
                if ($type === 'App\Visitor') {
                    $query->where('visitor_email', 'like', 'mail@md.co.id');
                }
                if ($type === 'App\EventExhibitor') {
                    $query->whereHas('company', function (Builder $subquery) {
                        $subquery->where('company_email', 'like', 'mail@md.co.id');
                    });
                }       
            }
        )->where('password', '$2y$10$JHQU1g4D5a44soPb.TwNGu8OnZrrFxChxDmau/SUQOubcQcIvoJ3a')->get();
    return $user;
});
