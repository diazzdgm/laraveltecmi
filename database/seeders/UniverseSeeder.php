<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Universe;

class UniverseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Universe::create([
            'name' => 'Marvel'
           ]);
           Universe::create([
            'name' => 'DC'
           ]);
           Universe::create([
            'name' => 'The boys'
           ]);
    }
}
