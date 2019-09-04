<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('login/steam', 'Auth\LoginController@redirectToProvider');
// Route::get('login/steam/callback', 'Auth\LoginController@handleProviderCallback');
Route::get('login/steam',          'Auth\SocialAccountController@redirectToProvider');
Route::get('login/steam/callback', 'Auth\SocialAccountController@handleProviderCallback');

Route::resource('users', 'UserController');
Route::resource('teams', 'TeamController');
Route::get('/teams/scrim/{team}', 'TeamController@readyScrim');
Route::get('/teams/notScrim/{team}', 'TeamController@notReadyScrim');

Route::get('/scrims', 'ScrimController@index');
Route::get('/scrims/add/{team}', 'ScrimController@add');
Route::post('/scrims', 'ScrimController@invite');
Route::get('/scrims/accept/{status}', 'ScrimController@acceptScrim');
Route::get('/scrims/reject/{status}', 'ScrimController@rejectScrim');
Route::get('/scrims-schedule', 'ScrimController@scrimList');

//button
Route::get('/offer/{user}', 'OfferController@invite');
Route::get('/accept/{offer}/notifications/{noti}', 'OfferController@acceptOffer');
Route::get('/reject/{offer}/notifications/{noti}', 'OfferController@rejectOffer');
Route::get('/leave/{team}', 'OfferController@leaveTeam');
Route::delete('notifications/{noti}', 'OfferController@deleteNoti');



Route::get('/tnotification', 'PagesController@notiScrim');
Route::get('/notifications', 'PagesController@noti');
Route::get('/steamconnects', 'PagesController@steam');
Route::get('players/{player}', 'PagesController@show');


Route::get('/tournaments', 'TournamentController@index');
Route::post('/tournaments', 'TournamentController@store');
Route::get('/tournaments/interested/{tournament}', 'TournamentController@interested');
Route::get('/tournaments/notInterested/{tournament}', 'TournamentController@notInterested');

//admin only
Route::get('/admin/tournaments/create', 'TournamentController@create')->middleware('admin');
Route::get('/admin', 'PagesController@adminIndex');
Route::get('/admin/tournaments', 'PagesController@adminTour');
Route::get('/admin/tournaments/{tournament}/edit', 'TournamentController@edit');
Route::patch('/admin/tournaments/{tournament}', 'TournamentController@update');
Route::get('/admin/tournaments/{tournament}/status', 'TournamentController@status');
