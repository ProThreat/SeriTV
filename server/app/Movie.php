<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = ['name', 'short_description', 'description', 'release_date', 'duration', 'additional_information', 'type', 'genre', 'crew'];

    protected $casts = [
        'name' => 'array',
        'release_date' => 'date',
        'additional_information' => 'array',
    ];

    // TODO add difference between series and films

    // Get all of the genres for the 'Seri'.
    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'seri_genre', 'seri_id', 'seri_genres_id');
    }

    // Get the type for the 'Seri'.
    public function types()
    {
        return $this->belongsTo(Type::class, 'type', 'id');
    }

    // Get the cast for the 'Seri'.
    public function cast()
    {
        return $this->belongsToMany(Crew::class, 'seri_cast', 'seri_id', 'seri_crew_id');
    }

    // Get the directors for the 'Seri'.
    public function directors()
    {
        return $this->belongsToMany(Crew::class, 'seri_directors', 'seri_id', 'seri_crew_id');
    }

    // Get the stars for the 'Seri'.
    public function stars()
    {
        return $this->belongsToMany(Crew::class, 'seri_stars', 'seri_id', 'seri_crew_id');
    }

    // Get the writers for the 'Seri'.
    public function writers()
    {
        return $this->belongsToMany(Crew::class, 'seri_writers', 'seri_id', 'seri_crew_id');
    }

}
