<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('languages')->insert([
            [
                'id' => 1,
                'name' => 'العربية',
                'flag' => 'ar.svg',
                'active' => true,
                'shortcut' => 'ar',
                'main' => true,
            ],
            [
                'id' => 2,
                'name' => 'English',
                'flag' => 'en.svg',
                'active' => true,
                'shortcut' => 'en',
                'main' => false,
            ],
            [
                'id' => 3,
                'name' => 'Deutsch',
                'flag' => 'de.svg',
                'active' => true,
                'shortcut' => 'de',
                'main' => false,
            ],
            [
                'id' => 4,
                'name' => 'Türkçe',
                'flag' => 'tr.svg',
                'active' => false,
                'shortcut' => 'tr',
                'main' => false,
            ],
            [
                'id' => 5,
                'name' => 'Svenska',
                'flag' => 'sw.png',
                'active' => false,
                'shortcut' => 'sw',
                'main' => false,
            ],
        ]);
    }
}
