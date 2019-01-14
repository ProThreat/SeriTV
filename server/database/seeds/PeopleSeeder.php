<?php

use Illuminate\Database\Seeder;

use \App\People;

class PeopleSeeder extends Seeder
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
            ['name' => 'Chris Pratt', 'description' => 'Christopher Michael Pratt is een Amerikaans acteur. Hij was onder meer te zien als Bright Abbott gedurende meer dan tachtig afleveringen van de televisieserie Everwood en in films als Wanted en Bride Wars. Van april 2009 tot 2015 speelde hij Andy Dwyer in de komedieserie Parks and Recreation.', 'images' => '', 'birthdate' => '1979-06-21']
        ];

        // Insert items
        foreach($items as $item)
          People::create(['name' => $item]);
    }
}
