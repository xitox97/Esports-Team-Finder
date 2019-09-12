<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LinkedSteamAccount extends Model
{

    protected $fillable = ['provider_name', 'provider_id','avatar_url','dota_id',
    'profile_url','steam_name', 'mmr', 'win_lose',  'medal', 'country',
    'leaderboard_rank'];

    public function user()
{
    return $this->belongsTo(User::class);


}

    protected $casts = [
        'win_lose' => 'json'];

}