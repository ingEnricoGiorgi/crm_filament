<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LeadSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('leads')->insert([
            [
                'name' => 'Mario',
                'surname' => 'Rossi',
                'email' => 'mario.rossi@test.com',
                'phone' => '3331234567',
                'current_status' => 'NEW',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Luca',
                'surname' => 'Bianchi',
                'email' => 'luca.bianchi@test.com',
                'phone' => '3337654321',
                'current_status' => 'CONTACTED',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Anna',
                'surname' => 'Verdi',
                'email' => 'anna.verdi@test.com',
                'phone' => '3339999999',
                'current_status' => 'NEW',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
