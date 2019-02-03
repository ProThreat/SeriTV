<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WatchlistMovies extends Model
{
    protected $fillable = ['user_id', 'movie_id', 'watched_type'];
}
