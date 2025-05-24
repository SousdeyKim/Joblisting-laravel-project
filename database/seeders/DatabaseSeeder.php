<?php

namespace Database\Seeders;

use App\Models\job;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'first_name' => 'Kim',
        //     'last_name' => 'Sokha',
        //     'email' => 'test@example.com',
        // ]);
        
//This code is used inside the DatabaseSeeder.php file to run a specific seeder.
        $this->call(JobSeeder::class);

    
    }
}
