<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Excavator extends Model
{
    protected $fillable = [
        'name',
        'model',
        'status',
        'location',
        'latitude',
        'longitude',
    ];
}
