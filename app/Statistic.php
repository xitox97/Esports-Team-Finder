<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);


    }

    protected $fillable = ['recent_match'];

    protected $casts = [
        'recent_match' => 'json'];
}
