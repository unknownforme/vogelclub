<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BreedingNumberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $memberIds = DB::table('members')->pluck('id')->toArray();

        if (empty($memberIds)) {
            return;
        }

        $breedingNumbers = [];
        for ($i = 1; $i <= 8; $i++) {
            $breedingNumbers[] = [
                'breeding_number' => 'BN-' . str_pad($i, 4, '0', STR_PAD_LEFT),
                'member_id' => $memberIds[array_rand($memberIds)],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('breeding_numbers')->insert($breedingNumbers);
    }
}
