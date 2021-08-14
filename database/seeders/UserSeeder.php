<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->withPersonalTeam()->create([
            'name' => 'Damien Robinson',
            'email' => 'damien.robinson@pocketpasta.com',
        ]);
        \App\Models\User::factory(10)->withPersonalTeam()->create();
    }
}
