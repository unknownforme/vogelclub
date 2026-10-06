<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class membertypesseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('addresses')->insert([
            'name' => "volwassen lid",
            'description' => "een lid wie ouder is dan 18",
            'price' => 3600
        ]);
        DB::table('addresses')->insert([
            'name' => "jeugdlid",
            'description' => "een lid wie jonger dan 18 is",
            'price' => 1800
        ]);
        DB::table('addresses')->insert([
            'name' => "gastlid",
            'description' => "een lid van de vereniging die geen NBvV-lid is, en dus geen kweeknummer heeft",
            'price' => 1800
        ]);
    }
}
