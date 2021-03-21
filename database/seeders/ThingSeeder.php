<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ThingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Thing::factory(10)->create();
    }
}
