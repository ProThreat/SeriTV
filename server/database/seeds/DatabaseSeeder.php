<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TypeSeeder::class);
        $this->call(GenreSeeder::class);
        $this->call(ProducerSeeder::class);
        $this->call(LicensorSeeder::class);
        $this->call(StudioSeeder::class);
        $this->call(MovieSeeder::class);
    }
}
