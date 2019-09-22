<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DotaJson extends Model
{
    protected $casts = [
        'items' => 'array',
        'heroes' => 'array',
        'hero_roles' => 'array',
    ];
}