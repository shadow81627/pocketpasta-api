<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::updateOrCreate([
            'name' => 'Annalisa Tomatoes Peeled 400g',
            'description' => 'Annalisa Italian Peeled Tomatoes In Tomato Juice a 100% Italian Tomatoes.',
            'gtin' => '8002560200564',
        ]);

        Product::factory()->count(10)->create();
    }
}
