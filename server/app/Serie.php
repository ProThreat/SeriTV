<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    protected $fillable = ['name', 'short_description', 'description', 'release_date', 'seasons', 'episodes', 'aired', 'duration', 'additional_information', 'type', 'genre', 'crew'];

    protected $casts = [
        'name' => 'array',
        'aired' => 'array',
        'release_date' => 'date',
        'additional_information' => 'array',
    ];

}
