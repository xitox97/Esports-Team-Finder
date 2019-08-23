<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'captain_id', 'name', 'area','age', 'qtty_member', 'image'
    ];


    public function users()
    {
        return $this->belongsToMany(User::class, 'user_team')->withTimestamps();
    }

    public function offers(){
        return $this->hasMany('App\Offer');
    }
}
