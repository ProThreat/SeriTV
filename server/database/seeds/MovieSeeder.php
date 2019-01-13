<?php

use Illuminate\Database\Seeder;

use \App\Movie;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get items
        $items = [
            ['image' => 'cat.jpg', 'images' => '', 'title' => 'The Avengers', 'short_description' => 'The epic battle to save the world', 'description' => 'Wil they survive this epic battle against the evil forces of Loki?', 'release_date' => '2019-01-13', 'duration' => '175', 'imdb_rating' => '7.0']
        ];

        // Insert items
        foreach($items as $item)
          Movie::create($item);
    }
}
