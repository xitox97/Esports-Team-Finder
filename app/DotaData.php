<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DotaData extends Model
{
    protected $casts = [
        'items' => 'array',

    ];
}
