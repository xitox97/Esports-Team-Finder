<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Knowledge extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'player_role',
    ];

    protected $casts = [
        'player_role' => 'array',
    ];
}
