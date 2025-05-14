<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsSeeder extends Seeder
{
    public function run()
    {
        DB::table('settings')->insert([
            ['name' => 'address', 'content' => json_encode('MRPM+M75, Hajine, Syria'), 'ordering' => 0, 'type' => 0],
            ['name' => 'phone', 'content' => json_encode('+963941882678'), 'ordering' => 0, 'type' => 0],
            ['name' => 'email', 'content' => json_encode('info@ensaf4dev.org'), 'ordering' => 0, 'type' => 0],
            ['name' => 'facebook', 'content' => json_encode(''), 'ordering' => 0, 'type' => 0],
            ['name' => 'form_image', 'content' => json_encode('1742496958man2312323.png'), 'ordering' => 100, 'type' => 1],
            ['name' => 'twitter', 'content' => json_encode('https://twitter.com/'), 'ordering' => 0, 'type' => 0],
            ['name' => 'instegram', 'content' => json_encode('https://www.instagram.com/qubex_official'), 'ordering' => 0, 'type' => 0],
            ['name' => 'whatsapp', 'content' => json_encode('https://api.whatsapp.com/message/TDPYCI3DQASSK1?autoload=1&app_absent=0'), 'ordering' => 0, 'type' => 0],
            ['name' => 'snapchat', 'content' => json_encode(''), 'ordering' => 0, 'type' => 0],
            ['name' => 'youtube', 'content' => json_encode(''), 'ordering' => 0, 'type' => 0],
            ['name' => 'telegram', 'content' => json_encode(''), 'ordering' => 0, 'type' => 0],
            ['name' => 'ar_about_us', 'content' => json_encode('شركة أسس للحلول البرمجية المتكاملة نقدم لكم خدمة تصميم وبرمجة المواقع الالكترونية وخدمة برمجة المتاجر الالكترونية مع تطبيقات الموبايل والتسويق الالكتروني وخدمات SEO'), 'ordering' => 0, 'type' => 0],
            ['name' => 'tr_about_us', 'content' => json_encode('موقع تعليمي خاص يعمل في مجال التعليم'), 'ordering' => 0, 'type' => 0],
            ['name' => 'en_about_us', 'content' => json_encode('موقع تعليمي خاص يعمل في مجال التعليم '), 'ordering' => 0, 'type' => 0],
            ['name' => 'logo', 'content' => json_encode('1741892984ensaflogo.png'), 'ordering' => 0, 'type' => 1],
            ['name' => 'map', 'content' => json_encode('<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3280.734985552904!2d40.830659476338745!3d34.68663747292471!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x154625b5eac1ec3f%3A0xf7fd1df6988f14aa!2sMRPM%2BM75%2C%20Hajine%2C%20Syria!5e0!3m2!1sen!2str!4v1741893381662!5m2!1sen!2str" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>'), 'ordering' => 0, 'type' => 0],
            ['name' => 'linkedin', 'content' => json_encode(''), 'ordering' => 0, 'type' => 0],
            ['name' => 'site_name', 'content' => json_encode('منصة أنصاف '), 'ordering' => 0, 'type' => 0],
            ['name' => 'ar_banner_main_text', 'content' => json_encode(''), 'ordering' => 0, 'type' => 0],
            ['name' => 'ar_banner_sub_text', 'content' => json_encode('يحتوي موقعنا على مئات الدروس والفيديوهات'), 'ordering' => 0, 'type' => 0],
            ['name' => 'nof_students', 'content' => json_encode('56'), 'ordering' => 0, 'type' => 0],
            ['name' => 'banner-image', 'content' => json_encode('1723662707234324324234.png'), 'ordering' => 0, 'type' => 1],
            ['name' => 'nof_courses', 'content' => json_encode('86'), 'ordering' => 0, 'type' => 0],
            ['name' => 'nof_teachers', 'content' => json_encode('8'), 'ordering' => 0, 'type' => 0],
            ['name' => 'nof_subjects', 'content' => json_encode('75'), 'ordering' => 0, 'type' => 0],
            ['name' => 'en_banner_main_text', 'content' => json_encode(''), 'ordering' => 0, 'type' => 0],
            ['name' => 'tr_banner_main_text', 'content' => json_encode(''), 'ordering' => 0, 'type' => 0],
            ['name' => 'buttons_color', 'content' => json_encode('#000'), 'ordering' => 10, 'type' => 0],
            ['name' => 'en_banner_sub_text', 'content' => json_encode(''), 'ordering' => 0, 'type' => 0],
            ['name' => 'tr_banner_sub_text', 'content' => json_encode(''), 'ordering' => 0, 'type' => 0],
            ['name' => 'ar_featured_title_1', 'content' => json_encode(''), 'ordering' => 0, 'type' => 0],
            ['name' => 'en_featured_title_1', 'content' => json_encode('عنوان انكليزي 1'), 'ordering' => 0, 'type' => 0],
            ['name' => 'tr_featured_title_1', 'content' => json_encode('عنوان تركي 1 '), 'ordering' => 0, 'type' => 0],
            ['name' => 'ar_featured_title_2', 'content' => json_encode('قيمنا'), 'ordering' => 0, 'type' => 0],
            ['name' => 'en_featured_title_2', 'content' => json_encode('عنوان انكليزي 2'), 'ordering' => 0, 'type' => 0],
            ['name' => 'tr_featured_title_2', 'content' => json_encode('عنوان تركي 2 '), 'ordering' => 0, 'type' => 0],
            ['name' => 'ar_featured_title_3', 'content' => json_encode('وسائلنا '), 'ordering' => 0, 'type' => 0],
            ['name' => 'en_featured_title_3', 'content' => json_encode('عنوان انكليزي 3'), 'ordering' => 0, 'type' => 0],
            ['name' => 'tr_featured_title_3', 'content' => json_encode('عنوان تركي 3'), 'ordering' => 0, 'type' => 0],
            ['name' => 'ar_featured_content_1', 'content' => json_encode('ما يميزنا رقم 1 '), 'ordering' => 0, 'type' => 0],
            ['name' => 'en_featured_content_1', 'content' => json_encode('محتوى انكليزي 1'), 'ordering' => 0, 'type' => 0],
            ['name' => 'tr_featured_content_1', 'content' => json_encode('محتوى تركي 1'), 'ordering' => 0, 'type' => 0],
            ['name' => 'ar_featured_content_2', 'content' => json_encode('ما يميزنا رقم2 '), 'ordering' => 0, 'type' => 0],
            ['name' => 'en_featured_content_2', 'content' => json_encode('محتوى انكليزي 2'), 'ordering' => 0, 'type' => 0],
            ['name' => 'tr_featured_content_2', 'content' => json_encode('محتوى تركي 2'), 'ordering' => 0, 'type' => 0],
            ['name' => 'ar_featured_content_3', 'content' => json_encode('ما يميزنا رقم 2 '), 'ordering' => 0, 'type' => 0],
            ['name' => 'en_featured_content_3', 'content' => json_encode('محتوى انكليزي 3'), 'ordering' => 0, 'type' => 0],
            ['name' => 'tr_featured_content_3', 'content' => json_encode('محتوى تركي 3'), 'ordering' => 0, 'type' => 0],
            ['name' => 'footer_logo', 'content' => json_encode('1741893194ensaflogo.png'), 'ordering' => 10, 'type' => 1],
            ['name' => 'login_image', 'content' => json_encode('17166352167789.png'), 'ordering' => 100, 'type' => 1],
            ['name' => 'buttons_border_radius', 'content' => json_encode('5'), 'ordering' => 10, 'type' => 0],
            ['name' => 'nav_background', 'content' => json_encode('#11324D'), 'ordering' => 10, 'type' => 0],
            ['name' => 'header_links_color', 'content' => json_encode('#C5A959'), 'ordering' => 10, 'type' => 0],
            ['name' => 'is_lms', 'content' => json_encode('0'), 'ordering' => 100, 'type' => 3],
            ['name' => 'membership_active', 'content' => json_encode('0'), 'ordering' => 100, 'type' => 3],
            ['name' => 'zoom_api_key', 'content' => json_encode('qjJ1RRTaRPyxBPYMV1zCfQ'), 'ordering' => 100, 'type' => 0],
            ['name' => 'zoom_api_secret_key', 'content' => json_encode('uo1XWo3kVcfuibYdZW2rmo4LTMnNKnei'), 'ordering' => 100, 'type' => 0],
            ['name' => 'slider_video_active', 'content' => json_encode('0'), 'ordering' => 100, 'type' => 3],
            ['name' => 'slider_video', 'content' => json_encode('1718714556video.mp4'), 'ordering' => 100, 'type' => 1],
            ['name' => 'footer_bg_color', 'content' => json_encode('#11324D'), 'ordering' => 100, 'type' => 0],
            ['name' => 'footer_bg_image', 'content' => json_encode(''), 'ordering' => 100, 'type' => 1],
            ['name' => 'faqs_image_enable', 'content' => json_encode('1'), 'ordering' => 100, 'type' => 3],
            ['name' => 'faqs_image', 'content' => json_encode('1719578495faq.png'), 'ordering' => 100, 'type' => 1]
        ]);
    }
}
