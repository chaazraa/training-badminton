<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CoachSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('coaches')->insert([
            [
                'name' => 'John Doe',
                'slug' => Str::slug('John Doe'),
                'photo' => 'john_doe.jpg',
                'phone' => '1234567890',
                'email' => 'johndoe@example.com',
                'birth_date' => '1985-05-15',
                'birth_place' => 'New York',
                'address' => '123 Main Street, New York, NY',
                'experience' => '10 years',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jane Smith',
                'slug' => Str::slug('Jane Smith'),
                'photo' => 'jane_smith.jpg',
                'phone' => '0987654321',
                'email' => 'janesmith@example.com',
                'birth_date' => '1990-08-20',
                'birth_place' => 'Los Angeles',
                'address' => '456 Elm Street, Los Angeles, CA',
                'experience' => '8 years',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}