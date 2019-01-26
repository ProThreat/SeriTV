<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WatchedMovies extends Model
{
    protected $fillable = ['user_id', 'movie_id'];
}
