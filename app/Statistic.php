<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);


    }

    protected $fillable = ['recent_match','heroes_played','tot_score',];

    protected $casts = [
        'recent_match' => 'json',
        'heroes_played' => 'json',
        'tot_score' => 'json',
    ];

    // public function getJsonField($value)
    // {
    //     return collect($value);
    // }
}
