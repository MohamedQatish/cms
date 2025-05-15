<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('blogs')->insert([
            [
                'title' => ' مقال تجريبي',
                'content' => 'هذا نص تجريبي لمحتوى المقال.',
                'category_id' => 1,
                'date' => now(),
                'featured' => 1,
                'image' => 'frontend/seed/blogs/blog1.jpg',
                'short_text' => 'مقال مختصر تجريبي',
                'tr_title' => 'Deneme Blog Başlığı',
                'tr_content' => 'Bu bir deneme blog içeriğidir.',
                'ar_short_text' => 'نص مختصر بالعربية',
                'tr_short_text' => 'Kısa metin TR',
                'ar_title' => 'عنوان المقال بالعربية',
                'ar_content' => 'محتوى المقال باللغة العربية',
                'ordering' => 1,
                'en_title' => 'Sample Blog Title',
                'en_content' => 'This is a sample blog content.',
                'en_short_text' => 'Sample short text in English',
                'de_title' => 'Beispiel Blog Titel',
                'de_content' => 'Dies ist ein Beispiel Blog Inhalt.',
                'de_short_text' => 'Kurzer Text auf Deutsch',
            ],
            [
                'title' => ' مقال تجريبي',
                'content' => 'هذا نص تجريبي لمحتوى المقال.',
                'category_id' => 2,
                'date' => now(),
                'featured' => 1,
                'image' => 'frontend/seed/blogs/blog2.jpg',
                'short_text' => 'مقال مختصر تجريبي',
                'tr_title' => 'Deneme Blog Başlığı',
                'tr_content' => 'Bu bir deneme blog içeriğidir.',
                'ar_short_text' => 'نص مختصر بالعربية',
                'tr_short_text' => 'Kısa metin TR',
                'ar_title' => 'عنوان المقال بالعربية',
                'ar_content' => 'محتوى المقال باللغة العربية',
                'ordering' => 2,
                'en_title' => 'Sample Blog Title',
                'en_content' => 'This is a sample blog content.',
                'en_short_text' => 'Sample short text in English',
                'de_title' => 'Beispiel Blog Titel',
                'de_content' => 'Dies ist ein Beispiel Blog Inhalt.',
                'de_short_text' => 'Kurzer Text auf Deutsch',
            ],
            [
                'title' => ' مقال تجريبي',
                'content' => 'هذا نص تجريبي لمحتوى المقال.',
                'category_id' => 1,
                'date' => now(),
                'featured' => 1,
                'image' => 'frontend/seed/blogs/blog3.jpg',
                'short_text' => 'مقال مختصر تجريبي',
                'tr_title' => 'Deneme Blog Başlığı',
                'tr_content' => 'Bu bir deneme blog içeriğidir.',
                'ar_short_text' => 'نص مختصر بالعربية',
                'tr_short_text' => 'Kısa metin TR',
                'ar_title' => 'عنوان المقال بالعربية',
                'ar_content' => 'محتوى المقال باللغة العربية',
                'ordering' => 3,
                'en_title' => 'Sample Blog Title',
                'en_content' => 'This is a sample blog content.',
                'en_short_text' => 'Sample short text in English',
                'de_title' => 'Beispiel Blog Titel',
                'de_content' => 'Dies ist ein Beispiel Blog Inhalt.',
                'de_short_text' => 'Kurzer Text auf Deutsch',
            ],
            [
                'title' => ' مقال تجريبي',
                'content' => 'هذا نص تجريبي لمحتوى المقال.',
                'category_id' => 1,
                'date' => now(),
                'featured' => 0,
                'image' => 'frontend/seed/blogs/blog4.jpg',
                'short_text' => 'مقال مختصر تجريبي',
                'tr_title' => 'Deneme Blog Başlığı',
                'tr_content' => 'Bu bir deneme blog içeriğidir.',
                'ar_short_text' => 'نص مختصر بالعربية',
                'tr_short_text' => 'Kısa metin TR',
                'ar_title' => 'عنوان المقال بالعربية',
                'ar_content' => 'محتوى المقال باللغة العربية',
                'ordering' => 1,
                'en_title' => 'Sample Blog Title',
                'en_content' => 'This is a sample blog content.',
                'en_short_text' => 'Sample short text in English',
                'de_title' => 'Beispiel Blog Titel',
                'de_content' => 'Dies ist ein Beispiel Blog Inhalt.',
                'de_short_text' => 'Kurzer Text auf Deutsch',
            ],
        ]);
    }
}
