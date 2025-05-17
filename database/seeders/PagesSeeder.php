<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Page;

class PagesSeeder extends Seeder
{
    public function run()
    {
        $pages = [
            [
                'name' => [
                    'en' => 'Home',
                    'ar' => 'الرئيسية',
                ],
                'content' => [
                    'en' => 'Welcome to our website',
                    'ar' => 'مرحبًا بكم في موقعنا',
                ],
                'title' => 'Home Page',
                'useful_links' => 1,
                'top_menu' => true,
                'parent_id' => 0,
                'ordering' => 1,
            ],
            [
                'name' => [
                    'en' => 'About Us',
                    'ar' => 'من نحن',
                ],
                'content' => [
                    'en' => 'About us content goes here.',
                    'ar' => 'محتوى صفحة من نحن هنا.',
                ],
                'title' => 'About Us Page',
                'useful_links' => 0,
                'top_menu' => true,
                'parent_id' => 0,
                'ordering' => 2,
            ],
            [
                'name' => [
                    'en' => 'Contact',
                    'ar' => 'اتصل بنا',
                ],
                'content' => [
                    'en' => 'Contact us via email or phone.',
                    'ar' => 'اتصل بنا عبر البريد الإلكتروني أو الهاتف.',
                ],
                'title' => 'Contact Page',
                'useful_links' => 0,
                'top_menu' => false,
                'parent_id' => 0,
                'ordering' => 3,
            ],
        ];

        foreach ($pages as $pageData) {
            Page::create($pageData);
        }
    }
}
