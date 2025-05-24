<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Job;
use App\Models\User;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a user to assign as the creator of the jobs

        // Optionally, you can create another specific job
        Job::factory()->create([
            'title' => 'Software Engineer',
            'salary' => '$50000',
        ]);
    }
}