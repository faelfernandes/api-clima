<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Climate extends Model
{
    use HasFactory;

    protected $fillable = [
        'city_name',
        'country_code',
        'temp',
        'temp_min',
        'temp_max'
    ];
}
