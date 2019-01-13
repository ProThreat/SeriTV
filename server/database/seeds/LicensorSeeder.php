<?php

use Illuminate\Database\Seeder;

use \App\Licensor;

class LicensorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get items
        $items = ['Aniiplex of America', 'Funimation'];

        // Insert items
        foreach($items as $item)
          Licensor::create(['name' => $item]);
    }
}
