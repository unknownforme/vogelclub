<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InvoiceSeeder extends Seeder
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

        $invoices = [];
        for ($i = 1; $i <= 15; $i++) {
            $status = $i % 2 === 0 ? 'paid' : 'unpaid';
            $invoices[] = [
                'member_id' => $memberIds[array_rand($memberIds)],
                'amount' => rand(10, 50), // cents
                'description' => 'Factuur ' . $i,
                'status' => $status,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('invoices')->insert($invoices);
    }
}
