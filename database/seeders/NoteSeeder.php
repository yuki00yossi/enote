<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        for ($i = 1; $i <= 10; $i++) {
            for ($j = 0; $j < 10; $j++) {
                DB::table('notes')->insert([
                    'name' => 'noteName' . $j,
                    'user_id' => $i,
                    'category_id' => random_int(1, 4),
                    'game_id' => random_int(1, 2),
                ]);
            }
        }
    }
}
