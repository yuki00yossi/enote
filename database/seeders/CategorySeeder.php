<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * カテゴリーシーダー初期値
 */
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('categories')->insert([
            'name' => 'Clutch',
            'bg_color' => 'black',
            'color' => 'white',
        ]);

        DB::table('categories')->insert([
            'name' => 'Death',
            'bg_color' => 'black',
            'color' => 'white',
        ]);

        DB::table('categories')->insert([
            'name' => '1v1',
            'bg_color' => 'black',
            'color' => 'white',
        ]);

        DB::table('categories')->insert([
            'name' => '1v2',
            'bg_color' => 'black',
            'color' => 'white',
        ]);

        DB::table('categories')->insert([
            'name' => '1v3',
            'bg_color' => 'black',
            'color' => 'white',
        ]);
    }
}
