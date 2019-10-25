<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;

class Location extends Model
{
    use SpatialTrait;

    protected $fillable = ['user_id', 'address'];
    protected $spatialFields = [
        'coordinate',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
