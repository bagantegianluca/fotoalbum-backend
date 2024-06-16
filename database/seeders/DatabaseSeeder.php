<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\PhotoSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\UserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class
        ]);

        $this->call([
            CategorySeeder::class
        ]);

        $this->call([
            PhotoSeeder::class
        ]);
    }
}
