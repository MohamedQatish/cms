<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsSeeder extends Seeder
{
    public function run()
    {
        $settings = [

            [
                'name' => 'address',
                'content' => json_encode(['value' => 'MRPM+M75, Hajine, Syria']),
                'ordering' => 0,
                'type' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'phone',
                'content' => json_encode(['value' => '+963941882678']),
                'ordering' => 0,
                'type' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'email',
                'content' => json_encode(['value' => 'info@ensaf4dev.org']),
                'ordering' => 0,
                'type' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'facebook',
                'content' => json_encode(['value' => '']),
                'ordering' => 0,
                'type' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'form_image',
                'content' => json_encode(['value' => '1742496958man2312323.png']),
                'ordering' => 100,
                'type' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'twitter',
                'content' => json_encode(['value' => 'https://twitter.com/']),
                'ordering' => 0,
                'type' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'instegram',
                'content' => json_encode(['value' => 'https://www.instagram.com/qubex_official']),
                'ordering' => 0,
                'type' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'whatsapp',
                'content' => json_encode(['value' => 'https://api.whatsapp.com/message/TDPYCI3DQASSK1?autoload=1&app_absent=0']),
                'ordering' => 0,
                'type' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'snapchat',
                'content' => json_encode(['value' => '']),
                'ordering' => 0,
                'type' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'youtube',
                'content' => json_encode(['value' => '']),
                'ordering' => 0,
                'type' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'telegram',
                'content' => json_encode(['value' => '']),
                'ordering' => 0,
                'type' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'logo',
                'content' => json_encode(['value' => '1741892984ensaflogo.png']),
                'ordering' => 0,
                'type' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'map',
                'content' => json_encode(['value' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3280.734985552904!2d40.830659476338745!3d34.68663747292471!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x154625b5eac1ec3f%3A0xf7fd1df6988f14aa!2sMRPM%2BM75%2C%20Hajine%2C%20Syria!5e0!3m2!1sen!2str!4v1741893381662!5m2!1sen!2str" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>']),
                'ordering' => 0,
                'type' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'linkedin',
                'content' => json_encode(['value' => '']),
                'ordering' => 0,
                'type' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'nof_students',
                'content' => json_encode(['value' => '56']),
                'ordering' => 0,
                'type' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'banner-image',
                'content' => json_encode(['value' => '1723662707234324324234.png']),
                'ordering' => 0,
                'type' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'nof_courses',
                'content' => json_encode(['value' => '86']),
                'ordering' => 0,
                'type' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'nof_teachers',
                'content' => json_encode(['value' => '8']),
                'ordering' => 0,
                'type' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'nof_subjects',
                'content' => json_encode(['value' => '75']),
                'ordering' => 0,
                'type' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'buttons_color',
                'content' => json_encode(['value' => '#000']),
                'ordering' => 10,
                'type' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'site_icon',
                'content' => json_encode(['value' => '1741893008ensaflogo.png']),
                'ordering' => 100,
                'type' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'main_color',
                'content' => json_encode(['value' => '#11324D']),
                'ordering' => 100,
                'type' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'title_color',
                'content' => json_encode(['value' => '#11324D']),
                'ordering' => 100,
                'type' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'footer_logo',
                'content' => json_encode(['value' => '1741893194ensaflogo.png']),
                'ordering' => 10,
                'type' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'login_image',
                'content' => json_encode(['value' => '17166352167789.png']),
                'ordering' => 100,
                'type' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'buttons_border_radius',
                'content' => json_encode(['value' => '5']),
                'ordering' => 10,
                'type' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'nav_background',
                'content' => json_encode(['value' => '#11324D']),
                'ordering' => 10,
                'type' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'header_links_color',
                'content' => json_encode(['value' => '#C5A959']),
                'ordering' => 10,
                'type' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'is_lms',
                'content' => json_encode(['value' => '0']),
                'ordering' => 100,
                'type' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'membership_active',
                'content' => json_encode(['value' => '0']),
                'ordering' => 100,
                'type' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'zoom_api_key',
                'content' => json_encode(['value' => 'qjJ1RRTaRPyxBPYMV1zCfQ']),
                'ordering' => 100,
                'type' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'zoom_api_secret_key',
                'content' => json_encode(['value' => 'uo1XWo3kVcfuibYdZW2rmo4LTMnNKnei']),
                'ordering' => 100,
                'type' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'slider_video_active',
                'content' => json_encode(['value' => '0']),
                'ordering' => 100,
                'type' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'slider_video',
                'content' => json_encode(['value' => '1718714556video.mp4']),
                'ordering' => 100,
                'type' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'footer_bg_color',
                'content' => json_encode(['value' => '#11324D']),
                'ordering' => 100,
                'type' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'footer_bg_image',
                'content' => json_encode(['value' => '']),
                'ordering' => 100,
                'type' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'faqs_image_enable',
                'content' => json_encode(['value' => '1']),
                'ordering' => 100,
                'type' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'faqs_image',
                'content' => json_encode(['value' => '1719578495faq.png']),
                'ordering' => 100,
                'type' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // البيانات متعددة اللغات (سيتم دمجها في سطر واحد لكل نوع)
            [
                'name' => 'about_us',
                'content' => json_encode([
                    'ar' => 'شركة أسس للحلول البرمجية المتكاملة نقدم لكم خدمة تصميم وبرمجة المواقع الالكترونية وخدمة برمجة المتاجر الالكترونية مع تطبيقات الموبايل والتسويق الالكتروني وخدمات SEO',
                    'en' => 'Educational private site working in the field of education',
                    'tr' => 'Eğitim alanında faaliyet gösteren özel site'
                ]),
                'ordering' => 0,
                'type' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'site_name',
                'content' => json_encode([
                    'ar' => 'منصة أنصاف',
                    'en' => 'Ensaf Platform',
                    'tr' => 'Ensaf Platform'
                ]),
                'ordering' => 0,
                'type' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'banner_main_text',
                'content' => json_encode([
                    'ar' => '',
                    'en' => '',
                    'tr' => ''
                ]),
                'ordering' => 0,
                'type' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'banner_sub_text',
                'content' => json_encode([
                    'ar' => 'يحتوي موقعنا على مئات الدروس والفيديوهات',
                    'en' => '',
                    'tr' => ''
                ]),
                'ordering' => 0,
                'type' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'featured_title_1',
                'content' => json_encode([
                    'ar' => '',
                    'en' => 'عنوان انكليزي 1',
                    'tr' => 'عنوان تركي 1'
                ]),
                'ordering' => 0,
                'type' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'featured_title_2',
                'content' => json_encode([
                    'ar' => 'قيمنا',
                    'en' => 'عنوان انكليزي 2',
                    'tr' => 'عنوان تركي 2'
                ]),
                'ordering' => 0,
                'type' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'featured_title_3',
                'content' => json_encode([
                    'ar' => 'وسائلنا',
                    'en' => 'عنوان انكليزي 3',
                    'tr' => 'عنوان تركي 3'
                ]),
                'ordering' => 0,
                'type' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'featured_content_1',
                'content' => json_encode([
                    'ar' => 'ما يميزنا رقم 1',
                    'en' => 'محتوى انكليزي 1',
                    'tr' => 'محتوى تركي 1'
                ]),
                'ordering' => 0,
                'type' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'featured_content_2',
                'content' => json_encode([
                    'ar' => 'ما يميزنا رقم2',
                    'en' => 'محتوى انكليزي 2',
                    'tr' => 'محتوى تركي 2'
                ]),
                'ordering' => 0,
                'type' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'featured_content_3',
                'content' => json_encode([
                    'ar' => 'ما يميزنا رقم 2',
                    'en' => 'محتوى انكليزي 3',
                    'tr' => 'محتوى تركي 3'
                ]),
                'ordering' => 0,
                'type' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('settings')->insert($settings);
    }
}
