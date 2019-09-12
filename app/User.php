<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','age', 'state', 'area',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime', 'is_admin' => 'boolean',
    ];

    public function accounts(){
        return $this->hasOne(LinkedSteamAccount::class);
    }

    public function team(){
        return $this->belongsToMany('App\Team', 'user_team')->withTimestamps();
    }

    public function offers(){
        return $this->hasMany('App\Offer');
    }

    public function tournaments()
    {
        return $this->belongsToMany('App\Tournament')->withTimestamps();
    }


    public function isAdmin()
    {
        return $this->is_admin;
    }

    public function statistic()
    {
        return $this->hasOne(Statistic::class);
    }
}
