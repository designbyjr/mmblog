<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

         \App\Models\ImportBlog::create([
             'title' => 'Test User 1',
             'description' => 'running along the walls',
             'publication_date' => Carbon::now()->toDateTimeString(),
         ]);
    }
}
