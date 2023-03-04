<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class NoteTimeLabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 100; $i++) {
            for ($j = 0; $j < 10; $j++) {
                DB::table('note_time_labels')->insert([
                    'title' => Str::random(random_int(20, 50)),
                    'note_id' => $i,
                    'play_time' => random_int(1, 600),
                    'comment' => Str::random(random_int(30, 500)),
                ]);
            }
        }
    }
}
