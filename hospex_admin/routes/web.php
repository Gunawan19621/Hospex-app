<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Connection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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

Auth::routes();

// Events
Route::group(['middleware' => ['auth']], function () { 
    Route::patch('/events/eventschedules/{eventschedules}','EventSchedulesController@update');

    Route::get('/events','EventController@index');
    Route::post('/events','EventController@store');
    Route::get('/events/getevents', 'EventController@getevents');
    Route::get('/events/create','EventController@create');
    Route::get('/events/{event}','EventController@show');
    Route::delete('/events/{event}','EventController@destroy');
    Route::get('/events/{event}/edit','EventController@edit');
    Route::get('/events/{event}/exhibitor','EventController@exhibitor');
    Route::get('/events/{event}/stand','EventController@stand');
    Route::get('/events/{event}/area','EventController@area');
    Route::get('/events/{event}/site-plan','EventController@siteplan');
    Route::get('/events/{event}/available-schedule','EventController@availableSchedule');
    Route::get('/events/{event}/upload-site-plan','EventController@uploadSiteplan');
    Route::patch('/events/{event}/site-plan','EventController@fileStore');
    Route::get('dropzone/{event}/fetch','EventController@fetch');
    Route::get('/dropzone/delete','EventController@dropzoneDelete')->name('dropzone.delete');

    Route::patch('/events/{event}','EventController@update');
    // yg atas adalah route default maka bisa diganti dengan yg bawah
    // Route::resource('events','EventController');
    Route::resource('eventschedules','EventSchedulesController');
    Route::get('/eventschedules/create/{event}','EventSchedulesController@create');

    Route::resource('eventrundown','EventRundownController');
    Route::get('/eventrundown/create/{schedule}','EventRundownController@create');

    // Categories
    Route::resource('categories', 'CategoriesController');

    // Companies
    Route::resource('companies', 'CompaniesController');

    // Sponsors
    Route::resource('sponsors', 'EventSponsorsController');

    // Areas
    Route::get('/areas/create/{event?}','AreasController@create');
    Route::resource('areas', 'AreasController');

    // Exhibitors
    Route::get('exhibitors/create/{event?}','EventExhibitorsController@create');
    Route::resource('exhibitors', 'EventExhibitorsController')->except(['create']);

    Route::get('available-schedule/create/{event?}','AvailableScheduleController@create');
    Route::resource('available-schedule','AvailableScheduleController')->except(['create']);

    // Stand
    Route::get('/stands/create/{event?}','StandsController@create');
    Route::resource('stands', 'StandsController')->except(['create']);

    // Visitors
    Route::resource('visitors', 'EventVisitorsController');

    // Matches
    Route::get('matches/pending', 'MatchRequestsController@pendingMatch')->name('matches.pending');
    Route::resource('matches', 'MatchRequestsController');
    Route::get('matches/{match}/approve', 'MatchRequestsController@approve');

    Route::get('home', function(){
        return redirect('/');
    });
});

Route::get('/', function(){
    return view('layout.content');
})->middleware('auth');

// excel
Route::get('export/{event?}', 'ExhibitorExcelController@export')->name('export');
Route::get('import-excel/{event?}', 'ExhibitorExcelController@importExportView');
Route::post('import', 'ExhibitorExcelController@import')->name('import');

Route::get('/connection', function () {
    try {
        DB::connection()->getPdo();
        if(DB::connection()->getDatabaseName()){
            echo "Yes! Successfully connected to the DB: " . DB::connection()->getDatabaseName();
        }else{
            die("Could not find the database. Please check your configuration.");
        }
    } catch (\Exception $e) {
    	echo $e;
        die("Could not open connection to database server.  Please check your configuration.");
    }
});