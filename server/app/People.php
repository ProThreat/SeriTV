<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    //
    protected $fillable = ['name', 'description', 'images', 'birthdate'];
}
