<?php

use Illuminate\Database\Seeder;

use \App\Producer;

class ProducerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get items
        $items = ['Aniiplex', 'Genco', 'DAX Production'];

        // Insert items
        foreach($items as $item)
          Producer::create(['name' => $item]);
    }
}
