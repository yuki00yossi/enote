<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('games')->insert([
            'title' => 'Apex Legends',
            'img_path' => '/img/game_logo/apex/ApexLegendsLogo.png',
        ]);

        DB::table('games')->insert([
            'title' => 'VALORANT',
            'img_path' => '/img/game_logo/valorant/valorantLogo.png',
        ]);
    }
}
