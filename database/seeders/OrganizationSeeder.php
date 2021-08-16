<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Organization::factory(10)->create();
    }
}
