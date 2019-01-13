<?php

use Illuminate\Database\Seeder;

use \App\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get types
        $types = ['OVA', 'Specials', 'Extra'];

        // Insert types
        foreach($types as $type)
          Type::create(['type' => $type]);
    }
}
