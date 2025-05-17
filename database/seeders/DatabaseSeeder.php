<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AdminSeeder::class,
            CountriesSeeder::class,
            EffectsSeeder::class,
            HomepageWidgetsSeeder::class,
            SettingsSeeder::class,
            FaqsSeeder::class,
            LanguagesTableSeeder::class,
            ServicesSeeder::class,
            ClientsSeeder::class,
            StoriesSeeder::class,
            BlogSeeder::class,
            PagesSeeder::class
        ]);
    }
}
