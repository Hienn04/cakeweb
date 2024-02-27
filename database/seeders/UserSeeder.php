<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'role' => 0,
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'email_verified_at' => now(),
            'created_at' => Carbon::now()
        ]);

        for ($i = 1; $i <= 5; $i++) {
            $id = $i + 1;
            DB::table('users')->insert([
                'id' => $id,
                'role' => 1,
                'name' => "User_" . $i,
                'email' => 'user' . $i . '@test.com',
                'password' => Hash::make('12345678'),
                'email_verified_at' => now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
