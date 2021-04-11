<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $thing = \App\Models\Thing::updateOrCreate([
            'name' => 'Annalisa Tomatoes Peeled 400g',
            'description' => 'Annalisa Italian Peeled Tomatoes In Tomato Juice a 100% Italian Tomatoes.',
        ]);
        \App\Models\Product::updateOrCreate([
            'thing_id' => $thing->id,
            'gtin13' => '8002560200564',
        ]);

        \App\Models\Product::factory(10)->create();
    }
}
