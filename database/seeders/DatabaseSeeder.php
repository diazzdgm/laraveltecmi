<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SuperHero;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * 
     */
    public function run(): void
    {
       $this->call([
        GenderSeeder::class,
        UniverseSeeder::class
       ]);

       SuperHero::factory(100)->create();
    }
}
