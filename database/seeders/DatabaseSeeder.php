<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //creating users
        \App\Models\User::factory(300)->create();

        //get the users from the database and shuff;e them so than we can create random employers using those shuffled data
        $users = \App\Models\User::all();

        //we create 20 records of the employers
        for ($i = 0; $i < 20; $i++) {
            \App\Models\Employer::factory()->create([
                'user_id' => $users->pop()->id,
            ]);
        }

        //we load all the employers from the table to map them with jobs we want to create
        //as a job is definitely need to be belonging to an employer

        $employers = \App\Models\Employer::all();

        //we create 100 jobs using the already created employer table data
        for ($i = 0; $i < 100; $i++) {
            \App\Models\Job::factory()->create([
                'employer_id' => $employers->random()->id,
            ]);
        }

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}