<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            FamilySeeder::class,
            UsersSeeder::class,
            CategorySeeder::class,
            PostSeeder::class,
            ImageSeeder::class,
            EventSeeder::class,
            Event_usersSeeder::class,
            QuizeSeeder::class,
            RecordSeeder::class,
        ]);
    }
}
