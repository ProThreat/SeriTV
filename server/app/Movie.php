<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = ['title', 'short_description', 'description', 'release_date', 'duration', 'additional_information', 'type', 'genre', 'crew', 'imdb_rating'];

    protected $casts = [
        'release_date' => 'date',
        'additional_information' => 'array',
        'imdb_rating' => 'float',
    ];

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'movie_genre', 'movie_id', 'genre_id');
    }

    public function cast()
    {
        return $this->belongsToMany(People::class, 'movie_cast', 'movie_id', 'people_id');
    }

    public function crew()
    {
        return $this->belongsToMany(People::class, 'movie_crew', 'movie_id', 'people_id');
    }

    public function licensors()
    {
        return $this->belongsToMany(Licensor::class, 'movie_licensors', 'movie_id', 'licensor_id');
    }

    public function producers()
    {
        return $this->belongsToMany(Producer::class, 'movie_producers', 'movie_id', 'producer_id');
    }

    public function studios()
    {
        return $this->belongsToMany(Studio::class, 'movie_studios', 'movie_id', 'studio_id');
    }

    public function reviews()
    {
        return $this->hasMany(MovieReview::class);
    }
    
    public function averageRating()
    {
        return $this->reviews->avg('rating');
    }

}
