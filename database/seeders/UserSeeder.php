<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        for ($i = 1; $i <= 10; $i++) {
            DB::table('users')->insert([
                'name' => Str::random(10),
                'email' => 'test'. $i .'@test.com',
                'password' => Hash::make('password'),
            ]);
        }
    }
}
