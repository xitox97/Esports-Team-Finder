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

use App\DotaData;
use App\DotaJson;
use App\Events\TournamentAdded;
use App\Jobs\consumeOpendotaApi;
use App\Jobs\generatePlayerRole;
use App\Jobs\processMatches;
use App\Knowledge;
use App\Match;
use App\Statistic;
use App\Tournament;
use App\User;

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::group(['middleware' => 'auth'], function () {


    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('login/steam',          'Auth\SocialAccountController@redirectToProvider');
    Route::get('login/steam/callback', 'Auth\SocialAccountController@handleProviderCallback');

    Route::resource('users', 'UserController');

    //search result
    Route::get('players/list', 'UserController@list');
    Route::resource('teams', 'TeamController');
    Route::get('/teams/scrim/{team}', 'TeamController@readyScrim');
    Route::get('/teams/notScrim/{team}', 'TeamController@notReadyScrim');
    Route::get('/kick/{user}/team/{team}', 'TeamController@kick');

    //recommendation
    Route::get('players/recommendation', 'RecommendationController@index');
    Route::post('players/recommendation', 'RecommendationController@search');


    //scrims
    Route::get('/scrims', 'ScrimController@index');
    Route::get('/scrims/add/{team}', 'ScrimController@add');
    Route::post('/scrims', 'ScrimController@invite');
    Route::get('/scrims/accept/{status}/notifications/{noti}', 'ScrimController@acceptScrim');
    Route::get('/scrims/reject/{status}/notifications/{noti}', 'ScrimController@rejectScrim');
    Route::get('/scrims-schedule', 'ScrimController@scrimList');
    Route::get('/scrims/{scrimid}/details', 'ScrimController@details');

    //button
    Route::get('/offer/{user}', 'OfferController@invite');
    Route::get('/accept/{offer}/notifications/{noti}', 'OfferController@acceptOffer');
    Route::get('/reject/{offer}/notifications/{noti}', 'OfferController@rejectOffer');
    Route::get('/leave/{team}', 'OfferController@leaveTeam');
    Route::delete('notifications/{noti}', 'OfferController@deleteNoti'); //delete noti bila tekan close dekat notification


    //pages
    Route::get('/notifications', 'PagesController@notiScrim');
    //Route::get('/notifications', 'PagesController@noti');
    Route::get('/steamconnects', 'PagesController@steam');
    Route::get('players/{player}', 'PagesController@show');
    Route::get('players/{player}/stats', 'PagesController@stats');
    Route::get('players/{player}/heroes', 'PagesController@heroes');
    Route::get('players/{player}/totals', 'PagesController@totals');

    //achivement
    Route::get('players/{player}/achievements', 'AchievementController@index');
    Route::get('players/{player}/achievements/create', 'AchievementController@create');
    Route::post('players/{player}/achievements/create', 'AchievementController@store');


    Route::get('/tournaments', 'TournamentController@index');
    Route::post('/tournaments', 'TournamentController@store');
    Route::get('/tournaments/interested/{tournament}', 'TournamentController@interested');
    Route::get('/tournaments/notInterested/{tournament}', 'TournamentController@notInterested');

    Route::get('/tournamentss', function () {
        //return Tournament::all();
        return Tournament::latest()->first();
    });

    //admin only
    Route::get('/admin/tournaments/create', 'TournamentController@create')->middleware('admin');
    Route::get('/admin', 'PagesController@adminIndex');
    Route::get('/admin/tournaments', 'PagesController@adminTour');
    Route::get('/admin/tournaments/{tournament}/edit', 'TournamentController@edit');
    Route::patch('/admin/tournaments/{tournament}', 'TournamentController@update');
    Route::get('/admin/tournaments/{tournament}/status', 'TournamentController@status');


    //match
    Route::get('/matches/{matchid}', 'MatchController@show');



    Route::get('/try-redis', function () {

        $user = User::where('id', auth()->id())->first();
        // dd($user);
        $stats = Statistic::first();

        //consumeOpendotaApi::dispatch($user);
        processMatches::dispatch($user, $stats);
        //generatePlayerRole::dispatch($user);

        // $data = DotaJson::first();

        // dd($data->items['broadsword']);

        return 'Finished';
    });

    Route::get('/try-json', function () {

        //    $match = Match::all();
        //    foreach($match as $m){
        //     echo $m->match_details['match_id'];
        //     echo "<br>";
        //    }

        // $match = Knowledge::where('id', 4)->first();
        // dd($match->player_role['mid']);

        //dd($match->items['blink']['id']);

        //code keluar kan image based on id
        // foreach($match->items as $m){
        //     if($m['id'] == 1)
        //     echo $m['img'];
        //     echo "<br>";
        // }
        $t = Tournament::latest()->first();
        event(new TournamentAdded($t));
        dd('la');
    });
});
