<?php

use Illuminate\Database\Seeder;

use \App\Genre;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // Get genres
      $genres = [
                'Action', 'Adventure', 'Cars', 'Comedy', 'Demons', 'Devil', 'Drama', 'Ecchi', 'Fantasy', 'Game', 'Harem', 'Hentai', 'Historical', 'Horror', 'Josei', 'Kids', 'Magic', 'Music', 'Mystery',
                'Parody', 'Police', 'Pyschological', 'Romance', 'Samurai', 'School', 'Sci-Fi', 'Seinien', 'Shoujo', 'Shounen', 'Slice of life', 'Space', 'Vampire', 'Yaoi', 'Yuri', 'Biographical', 'Drama',
                'Family', 'Gangster', 'Costume drama', 'Crime', 'Musical', 'Porn', 'Psychological Thriller', 'Disaster', 'Sports', 'Western', '3D', 'Documentary', 'Advertisement'
            ];

      // Insert types
      foreach($genres as $genre)
        Genre::insert(['genre' => $genre]);
    }
}
