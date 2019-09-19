<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecommendationController extends Controller
{
    //finder properties - what kind of player, finder want to find
    //product properties - stats player
    //constraint - finder nak mid lane, tp dia ni support player so tak boleh
    //filter conditions - Mid player -> kill banyak, duit banyak, lane mid. etc


    Vc (finder properties/requiremet) =
        position player -> core or support (optional = kasi pos apa 1/2/3/4/5)
        rank -> archon -> or more
        exp -> yes or no
        profile -> captain, stratcaller and more
        tournament -> nama tournament apa nak join tu;

    vprod (product properties) =
        name
        position = calculate whether dia bayak main support or core (utk optional amik dari input user)

    cr - finder nak mid lane, tp dia ni support player so tak boleh

    cf - User requirement for Player that
    has experience in playing
    tournament should not receive
    recommendations which include
    newbie player.

    cprod - list player yg mematuhi semua constraint

    //buat scheduler untuk generate user tu core or support player.

