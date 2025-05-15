<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsSeeder extends Seeder
{
    public function run()
    {
        DB::table('settings')->insert([
            ['name' => 'address', 'content' => json_encode([
                'ar' => 'في سوريا',
                'en' => 'in syria',
                'tr' => 'tr syria',
            ]), 'ordering' => 0, 'type' => 0],

            ['name' => 'phone', 'content' => json_encode([
                'ar' => '+963941882678',
                'en' => '+963941882678',
                'tr' => '+963941882678',
            ]), 'ordering' => 0, 'type' => 0],

            ['name' => 'email', 'content' => json_encode([
                'ar' => 'info@ensaf4dev.org',
                'en' => 'info@ensaf4dev.org',
                'tr' => 'info@ensaf4dev.org',
            ]), 'ordering' => 0, 'type' => 0],

            ['name' => 'facebook', 'content' => json_encode([
                'ar' => '',
                'en' => '',
                'tr' => '',
            ]), 'ordering' => 0, 'type' => 0],

            ['name' => 'form_image', 'content' => json_encode([
                'ar' => '1742496958man2312323.png',
                'en' => '1742496958man2312323.png',
                'tr' => '1742496958man2312323.png',
            ]), 'ordering' => 100, 'type' => 1],

            ['name' => 'twitter', 'content' => json_encode([
                'ar' => 'https://twitter.com/',
                'en' => 'https://twitter.com/',
                'tr' => 'https://twitter.com/',
            ]), 'ordering' => 0, 'type' => 0],

            ['name' => 'instegram', 'content' => json_encode([
                'ar' => 'https://www.instagram.com/qubex_official',
                'en' => 'https://www.instagram.com/qubex_official',
                'tr' => 'https://www.instagram.com/qubex_official',
            ]), 'ordering' => 0, 'type' => 0],

            ['name' => 'whatsapp', 'content' => json_encode([
                'ar' => 'https://api.whatsapp.com/message/TDPYCI3DQASSK1?autoload=1&app_absent=0',
                'en' => 'https://api.whatsapp.com/message/TDPYCI3DQASSK1?autoload=1&app_absent=0',
                'tr' => 'https://api.whatsapp.com/message/TDPYCI3DQASSK1?autoload=1&app_absent=0',
            ]), 'ordering' => 0, 'type' => 0],

            ['name' => 'snapchat', 'content' => json_encode([
                'ar' => '',
                'en' => '',
                'tr' => '',
            ]), 'ordering' => 0, 'type' => 0],

            ['name' => 'youtube', 'content' => json_encode([
                'ar' => '',
                'en' => '',
                'tr' => '',
            ]), 'ordering' => 0, 'type' => 0],

            ['name' => 'telegram', 'content' => json_encode([
                'ar' => '',
                'en' => '',
                'tr' => '',
            ]), 'ordering' => 0, 'type' => 0],

            ['name' => 'about_us', 'content' => json_encode([
                'ar' => 'شركة أسس للحلول البرمجية المتكاملة نقدم لكم خدمة تصميم وبرمجة المواقع الالكترونية وخدمة برمجة المتاجر الالكترونية مع تطبيقات الموبايل والتسويق الالكتروني وخدمات SEO',
                'en' => 'موقع تعليمي خاص يعمل في مجال التعليم ',
                'tr' => 'موقع تعليمي خاص يعمل في مجال التعليم',
            ]), 'ordering' => 0, 'type' => 0],

            ['name' => 'logo', 'content' => json_encode([
                'ar' => '1741892984ensaflogo.png',
                'en' => '1741892984ensaflogo.png',
                'tr' => '1741892984ensaflogo.png',
            ]), 'ordering' => 0, 'type' => 1],

            ['name' => 'map', 'content' => json_encode([
                'ar' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3280.734985552904!2d40.830659476338745!3d34.68663747292471!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x154625b5eac1ec3f%3A0xf7fd1df6988f14aa!2sMRPM%2BM75%2C%20Hajine%2C%20Syria!5e0!3m2!1sen!2str!4v1741893381662!5m2!1sen!2str" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
                'en' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3280.734985552904!2d40.830659476338745!3d34.68663747292471!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x154625b5eac1ec3f%3A0xf7fd1df6988f14aa!2sMRPM%2BM75%2C%20Hajine%2C%20Syria!5e0!3m2!1sen!2str!4v1741893381662!5m2!1sen!2str" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
                'tr' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3280.734985552904!2d40.830659476338745!3d34.68663747292471!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x154625b5eac1ec3f%3A0xf7fd1df6988f14aa!2sMRPM%2BM75%2C%20Hajine%2C%20Syria!5e0!3m2!1sen!2str!4v1741893381662!5m2!1sen!2str" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            ]), 'ordering' => 0, 'type' => 0],

            ['name' => 'linkedin', 'content' => json_encode([
                'ar' => '',
                'en' => '',
                'tr' => '',
            ]), 'ordering' => 0, 'type' => 0],

            ['name' => 'site_name', 'content' => json_encode([
                'ar' => 'منصة أنصاف ',
                'en' => 'Ensaf Platform',
                'tr' => 'Ensaf Platform',
            ]), 'ordering' => 0, 'type' => 0],

            ['name' => 'nof_students', 'content' => json_encode([
                'ar' => '56',
                'en' => '56',
                'tr' => '56',
            ]), 'ordering' => 0, 'type' => 0],

            ['name' => 'banner-image', 'content' => json_encode([
                'ar' => '1723662707234324324234.png',
                'en' => '1723662707234324324234.png',
                'tr' => '1723662707234324324234.png',
            ]), 'ordering' => 0, 'type' => 1],

            ['name' => 'nof_courses', 'content' => json_encode([
                'ar' => '86',
                'en' => '86',
                'tr' => '86',
            ]), 'ordering' => 0, 'type' => 0],

            ['name' => 'nof_teachers', 'content' => json_encode([
                'ar' => '8',
                'en' => '8',
                'tr' => '8',
            ]), 'ordering' => 0, 'type' => 0],

            ['name' => 'nof_subjects', 'content' => json_encode([
                'ar' => '75',
                'en' => '75',
                'tr' => '75',
            ]), 'ordering' => 0, 'type' => 0],

            ['name' => 'banner_main_text', 'content' => json_encode([
                'ar' => '',
                'en' => '',
                'tr' => '',
            ]), 'ordering' => 0, 'type' => 0],

            ['name' => 'banner_sub_text', 'content' => json_encode([
                'ar' => 'يحتوي موقعنا على مئات الدروس والفيديوهات',
                'en' => '',
                'tr' => '',
            ]), 'ordering' => 0, 'type' => 0],

            ['name' => 'buttons_color', 'content' => json_encode([
                'ar' => '#000',
                'en' => '#000',
                'tr' => '#000',
            ]), 'ordering' => 10, 'type' => 0],

            ['name' => 'featured_title_1', 'content' => json_encode([
                'ar' => '',
                'en' => 'عنوان انكليزي 1',
                'tr' => 'عنوان تركي 1',
            ]), 'ordering' => 0, 'type' => 0],

            ['name' => 'featured_title_2', 'content' => json_encode([
                'ar' => 'قيمنا',
                'en' => 'عنوان انكليزي 2',
                'tr' => 'عنوان تركي 2',
            ]), 'ordering' => 0, 'type' => 0],

            ['name' => 'featured_title_3', 'content' => json_encode([
                'ar' => 'وسائلنا',
                'en' => 'عنوان انكليزي 3',
                'tr' => 'عنوان تركي 3',
            ]), 'ordering' => 0, 'type' => 0],

            ['name' => 'featured_content_1', 'content' => json_encode([
                'ar' => 'ما يميزنا رقم 1',
                'en' => 'محتوى انكليزي 1',
                'tr' => 'محتوى تركي 1',
            ]), 'ordering' => 0, 'type' => 0],

            ['name' => 'featured_content_2', 'content' => json_encode([
                'ar' => 'ما يميزنا رقم2',
                'en' => 'محتوى انكليزي 2',
                'tr' => 'محتوى تركي 2',
            ]), 'ordering' => 0, 'type' => 0],

            ['name' => 'featured_content_3', 'content' => json_encode([
                'ar' => 'ما يميزنا رقم 2',
                'en' => 'محتوى انكليزي 3',
                'tr' => 'محتوى تركي 3',
            ]), 'ordering' => 0, 'type' => 0],

            ['name' => 'site_icon', 'content' => json_encode([
                'ar' => '1741893008ensaflogo.png',
                'en' => '1741893008ensaflogo.png',
                'tr' => '1741893008ensaflogo.png',
            ]), 'ordering' => 100, 'type' => 1],

            ['name' => 'main_color', 'content' => json_encode([
                'ar' => '#11324D',
                'en' => '#11324D',
                'tr' => '#11324D',
            ]), 'ordering' => 100, 'type' => 0],

            ['name' => 'title_color', 'content' => json_encode([
                'ar' => '#11324D',
                'en' => '#11324D',
                'tr' => '#11324D',
            ]), 'ordering' => 100, 'type' => 0],

            ['name' => 'footer_logo', 'content' => json_encode([
                'ar' => '1741893194ensaflogo.png',
                'en' => '1741893194ensaflogo.png',
                'tr' => '1741893194ensaflogo.png',
            ]), 'ordering' => 10, 'type' => 1],

            ['name' => 'login_image', 'content' => json_encode([
                'ar' => '17166352167789.png',
                'en' => '17166352167789.png',
                'tr' => '17166352167789.png',
            ]), 'ordering' => 100, 'type' => 1],

            ['name' => 'buttons_border_radius', 'content' => json_encode([
                'ar' => '5',
                'en' => '5',
                'tr' => '5',
            ]), 'ordering' => 10, 'type' => 0],

        ]);
    }
}
