<?php

use Illuminate\Database\Seeder;

use \App\Studio;

class StudioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get items
        $items = ['A-1 Pictures', 'Funimation'];

        // Insert items
        foreach($items as $item)
          Studio::create(['name' => $item]);
    }
}
