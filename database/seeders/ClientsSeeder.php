<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ClientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('clients')->insert([
            [
                'image' => 'frontend/seed/partners/partner-logo-1.png',
                'link' => 'https://www.client1.com',
                'Name' => 'client',
            ],
            [
                'image' => 'frontend/seed/partners/partner-logo-2.png',
                'link' => 'https://www.client2.net',
                'Name' => 'client',
            ],
            [
                'image' => 'frontend/seed/partners/partner-logo-3.png',
                'link' => '#',
                'Name' => 'client',
            ],
            [
                'image' => 'frontend/seed/partners/partner-logo-4.png',
                'link' => 'https://example.org/client4',
                'Name' => 'client',
            ],
            [
                'image' => 'frontend/seed/partners/partner-logo-4.png',
                'link' => 'https://www.anotherclient.co.uk',
                'Name' => 'client',
            ],
        ]);
    }
}
