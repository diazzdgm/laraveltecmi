<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Gender;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Gender::create([
        'name' => 'Female'
       ]);
       Gender::create([
        'name' => 'Male'
       ]);
       Gender::create([
        'name' => 'Others'
       ]);
    }
}
