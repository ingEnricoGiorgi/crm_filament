<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            "name" => "Digital",
            "surname" => "Ideators",
            "email" => "info@digitalideators.com",
            "email_verified_at" => \Carbon\Carbon::now(),
            "role_id" => 1,
            "password" => Hash::make("info@1234!")
        ]);
        $user->save();

        $user = User::create([
            "name" => "Admin",
            "surname" => "Admin",
            "email" => "admin@digitest.com",
            "email_verified_at" => \Carbon\Carbon::now(),
            "role_id" => 2,
            "password" => Hash::make("admin@1234!")
        ]);
        $user->save();

        $user = User::create([
            "name" => "Piero",
            "surname" => "Verdi",
            "email" => "manager@digitest.com",
            "email_verified_at" => \Carbon\Carbon::now(),
            "role_id" => 3,
            "password" => Hash::make("manager@1234!")
        ]);
        $user->save();

        $user = User::create([
            "name" => "Giovanni",
            "surname" => "Neri",
            "email" => "operator@digitest.com",
            "email_verified_at" => \Carbon\Carbon::now(),
            "role_id" => 4,
            "password" => Hash::make("operator@1234!")
        ]);
        $user->save();
    }
}
