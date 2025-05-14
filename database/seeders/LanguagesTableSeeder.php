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
                'flag' => 'languages/ar.png',
                'active' => true,
                'shortcut' => 'ar',
                'main' => true,
            ],
            [
                'id' => 2,
                'name' => 'English',
                'flag' => 'languages/en.png',
                'active' => true,
                'shortcut' => 'en',
                'main' => false,
            ],
            [
                'id' => 3,
                'name' => 'Deutsch',
                'flag' => 'languages/de.png',
                'active' => true,
                'shortcut' => 'de',
                'main' => false,
            ],
            [
                'id' => 4,
                'name' => 'Türkçe',
                'flag' => 'languages/tr.png',
                'active' => false,
                'shortcut' => 'tr',
                'main' => false,
            ],
            [
                'id' => 5,
                'name' => 'Svenska',
                'flag' => 'languages/sw.png',
                'active' => false,
                'shortcut' => 'sw',
                'main' => false,
            ],
        ]);
    }
}
