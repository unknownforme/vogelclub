<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(addressseeder::class);
        $this->call(membertypesseeder::class);
        
        // Seed the new data
        $this->call(memberseeder::class);
        $this->call(InvoiceSeeder::class);
        $this->call(BreedingNumberSeeder::class);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
