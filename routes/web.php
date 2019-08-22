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
Route::get('/offer/{user}', 'OfferController@invite');
Route::get('/accept/{offer}', 'OfferController@acceptOffer');
Route::get('/reject/{offer}', 'OfferController@rejectOffer');

Route::get('/notifications', 'PagesController@noti');
Route::get('/steamconnects', 'PagesController@steam');
Route::get('players/{player}', 'PagesController@show');
