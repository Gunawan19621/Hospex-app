<?php

use Illuminate\Support\Facades\Route;
use App\Event;
use App\EventSchedule;
use App\EventRundown;
use App\User;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('index');
// });
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/about', function () {
//     // $nama = 'Lulu Muhamad';
//     return view('about', ['nama' => 'Lulu Muhamad']);
// });

// Route::get('/', 'PagesController@home');
// Route::get('/about', 'PagesController@about');
// Route::get('/employee', 'EmployeeController@index');

// Events
Route::get('/events','EventController@index');
Route::post('/events','EventController@store');
Route::get('/events/getevents', 'EventController@getevents');
Route::get('/events/create','EventController@create');
Route::get('/events/{event}','EventController@show');
Route::delete('/events/{event}','EventController@destroy');
Route::get('/events/{event}/edit','EventController@edit');
Route::get('/events/{event}/exhibitor','EventController@exhibitor');
Route::get('/events/{event}/area','EventController@area')->name('events.area');
Route::patch('/events/{event}','EventController@update');
// yg atas adalah route default maka bisa diganti dengan yg bawah
// Route::resource('events','EventController');
Route::resource('eventschedules','EventSchedulesController');
Route::get('/eventschedules/create/{event}','EventSchedulesController@create');
Route::resource('eventrundown','EventRundownController');
Route::get('/eventrundown/create/{schedule}','EventRundownController@create');


// Categories
// Route::get('/categories/getcategories', 'CategoriesController@getCategories');
Route::resource('categories', 'CategoriesController');

// Companies
Route::resource('companies', 'CompaniesController');

// Sponsors
Route::resource('sponsors', 'EventSponsorController');

// Areas
Route::resource('areas', 'AreasController');

// Exhibitors
Route::resource('exhibitors', 'EventExhibitorsController');

// Stand
Route::resource('stands', 'StandsController');

// Visitors
Route::resource('visitors', 'VisitorsController');

// Matches
Route::resource('matches', 'MatchRequestsController');


Route::get('/ambil',function(){
    $event = Event::all();
    return $event->schedules;

});

Route::get('/', function(){
    return view('layout.content');
});

Route::get('/read', function(){
    $user = User::findorfail(1);
    return $user->usertable;
});




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
