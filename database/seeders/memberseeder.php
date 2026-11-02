<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class memberseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $addressId = DB::table('addresses')->first()->id ?? null;
        $memberTypeIds = DB::table('member_types')->pluck('id')->toArray();

        if (!$addressId || empty($memberTypeIds)) {
            return;
        }

        $members = [];
        for ($i = 1; $i <= 10; $i++) {
            $members[] = [
                'member_type_id' => $memberTypeIds[array_rand($memberTypeIds)],
                'address_id' => $addressId,
                'first_name' => 'Naam' . $i,
                'last_name' => 'Achternaam' . $i,
                'email' => 'member' . $i . '@example.com',
                'birth_date' => '1980-01-01',
                'nbvv_number' => 'NBVV-' . str_pad($i, 4, '0', STR_PAD_LEFT),
                'is_active' => $i % 3 === 0 ? false : true,
                'cancellation_requested' => false,
                'price' => 3600,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('members')->insert($members);
    }
}
