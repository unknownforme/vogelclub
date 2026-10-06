<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class addressseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('addresses')->insert([
            'street' => fake()->streetName(),
            'house_number' => fake()->numberBetween(1, 200),
            'postal_code' => Str::random(2) . fake()->numberBetween(1000, 9999),
            'city' => fake()->city(),
        ]);        
    }
}
