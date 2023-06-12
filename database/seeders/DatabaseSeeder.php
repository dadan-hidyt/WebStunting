<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\StandardAntropometriPbByUmur;
use App\Models\StandardAntropometriTbByUmur;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

         \App\Models\User::factory()->create([
             'name' => 'root',
             'email' => 'root@root.com',
             'password' => password_hash('root',PASSWORD_DEFAULT),
         ]);
//        $this->call(StandardBbByUmurSeeder::class);
//        $this->call(StandardAntropometriPbByUmurSeeder::class);
//        $this->call(StandardAntropometriTbByUmurSeeder::class);
    }
}
