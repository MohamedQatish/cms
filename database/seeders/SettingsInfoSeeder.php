<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsInfoSeeder extends Seeder
{

    public function run()
    {
        $settings = [
            // معلومات التواصل
            [
                'id' => 2,
                'name' => 'address',
                'content' => 'MRPM+M75, Hajine, Syria',
                'ordering' => 0,
                'type' => 0,
                'ar_name' => 'العنوان'
            ],
            [
                'id' => 3,
                'name' => 'phone',
                'content' => '+963941882678',
                'ordering' => 0,
                'type' => 0,
                'ar_name' => 'رقم الهاتف'
            ],
            [
                'id' => 4,
                'name' => 'email',
                'content' => 'info@ensaf4dev.org',
                'ordering' => 0,
                'type' => 0,
                'ar_name' => 'البريد الالكتروني'
            ],

            // وسائل التواصل الاجتماعي
            [
                'id' => 5,
                'name' => 'facebook',
                'content' => '',
                'ordering' => 0,
                'type' => 0,
                'ar_name' => 'فيسبوك'
            ],
            [
                'id' => 6,
                'name' => 'twitter',
                'content' => 'https://twitter.com/',
                'ordering' => 0,
                'type' => 0,
                'ar_name' => 'تويتر'
            ],
            [
                'id' => 7,
                'name' => 'instegram',
                'content' => 'https://www.instagram.com/qubex_official',
                'ordering' => 0,
                'type' => 0,
                'ar_name' => 'انستغرام'
            ],
            [
                'id' => 8,
                'name' => 'whatsapp',
                'content' => 'https://api.whatsapp.com/message/TDPYCI3DQASSK1?autoload=1&app_absent=0',
                'ordering' => 0,
                'type' => 0,
                'ar_name' => 'واتس أب'
            ],
            [
                'id' => 9,
                'name' => 'snapchat',
                'content' => '',
                'ordering' => 0,
                'type' => 0,
                'ar_name' => 'سناب شات'
            ],
            [
                'id' => 10,
                'name' => 'youtube',
                'content' => '',
                'ordering' => 0,
                'type' => 0,
                'ar_name' => 'يوتيوب'
            ],
            [
                'id' => 11,
                'name' => 'telegram',
                'content' => '',
                'ordering' => 0,
                'type' => 0,
                'ar_name' => 'تلغرام'
            ],
            [
                'id' => 18,
                'name' => 'linkedin',
                'content' => '',
                'ordering' => 0,
                'type' => 0,
                'ar_name' => 'لينكد إن'
            ],

            // معلومات الموقع
            [
                'id' => 20,
                'name' => 'site_name',
                'content' => 'منصة أنصاف',
                'ordering' => 0,
                'type' => 0,
                'ar_name' => 'اسم الموقع'
            ],
            [
                'id' => 13,
                'name' => 'ar_about_us',
                'content' => 'شركة أسس للحلول البرمجية المتكاملة نقدم لكم خدمة تصميم وبرمجة المواقع الالكترونية وخدمة برمجة المتاجر الالكترونية مع تطبيقات الموبايل والتسويق الالكتروني وخدمات SEO',
                'ordering' => 0,
                'type' => 0,
                'ar_name' => 'حولنا بالعربي'
            ],
            [
                'id' => 14,
                'name' => 'tr_about_us',
                'content' => 'موقع تعليمي خاص يعمل في مجال التعليم',
                'ordering' => 0,
                'type' => 0,
                'ar_name' => 'حولنا بالتركي'
            ],
            [
                'id' => 15,
                'name' => 'en_about_us',
                'content' => 'موقع تعليمي خاص يعمل في مجال التعليم',
                'ordering' => 0,
                'type' => 0,
                'ar_name' => 'حولنا بالانكليزي'
            ],
            [
                'id' => 17,
                'name' => 'map',
                'content' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3280.734985552904!2d40.830659476338745!3d34.68663747292471!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x154625b5eac1ec3f%3A0xf7fd1df6988f14aa!2sMRPM%2BM75%2C%20Hajine%2C%20Syria!5e0!3m2!1sen!2str!4v1741893381662!5m2!1sen!2str" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
                'ordering' => 0,
                'type' => 0,
                'ar_name' => 'الخريطة'
            ],

            // الصور والملفات
            [
                'id' => 16,
                'name' => 'logo',
                'content' => '1741892984ensaflogo.png',
                'ordering' => 0,
                'type' => 1,
                'ar_name' => 'اللوغو'
            ],
            [
                'id' => 53,
                'name' => 'site_icon',
                'content' => '1741893008ensaflogo.png',
                'ordering' => 100,
                'type' => 1,
                'ar_name' => 'أيقونة الموقع'
            ],
            [
                'id' => 51,
                'name' => 'footer_logo',
                'content' => '1741893194ensaflogo.png',
                'ordering' => 10,
                'type' => 1,
                'ar_name' => 'لوغو الفوتر'
            ],
            [
                'id' => 52,
                'name' => 'login_image',
                'content' => '17166352167789.png',
                'ordering' => 100,
                'type' => 1,
                'ar_name' => 'صورة تسجيل الدخول'
            ],
            [
                'id' => 70,
                'name' => 'form_image',
                'content' => '1742496958man2312323.png',
                'ordering' => 100,
                'type' => 1,
                'ar_name' => 'صورة الفورم'
            ],
            [
                'id' => 23,
                'name' => 'banner-image',
                'content' => '1723662707234324324234.png',
                'ordering' => 0,
                'type' => 1,
                'ar_name' => 'صورة البانر'
            ],
            [
                'id' => 65,
                'name' => 'slider_video',
                'content' => '1718714556video.mp4',
                'ordering' => 100,
                'type' => 1,
                'ar_name' => 'فيديو السلايدر'
            ],
            [
                'id' => 69,
                'name' => 'faqs_image',
                'content' => '1719578495faq.png',
                'ordering' => 100,
                'type' => 1,
                'ar_name' => 'صورة الأسئلة الشائعة'
            ],
            [
                'id' => 67,
                'name' => 'footer_bg_image',
                'content' => '',
                'ordering' => 100,
                'type' => 1,
                'ar_name' => 'صورة الخلفية للقسم السفلي'
            ],

            // إحصائيات
            [
                'id' => 25,
                'name' => 'nof_students',
                'content' => '56',
                'ordering' => 0,
                'type' => 0,
                'ar_name' => 'عدد الطلاب'
            ],
            [
                'id' => 26,
                'name' => 'nof_courses',
                'content' => '86',
                'ordering' => 0,
                'type' => 0,
                'ar_name' => 'عدد الدورات'
            ],
            [
                'id' => 27,
                'name' => 'nof_teachers',
                'content' => '8',
                'ordering' => 0,
                'type' => 0,
                'ar_name' => 'عدد الاساتذة'
            ],
            [
                'id' => 28,
                'name' => 'nof_subjects',
                'content' => '75',
                'ordering' => 0,
                'type' => 0,
                'ar_name' => 'عدد المواد'
            ],

            // محتوى البانر
            [
                'id' => 21,
                'name' => 'ar_banner_main_text',
                'content' => '',
                'ordering' => 0,
                'type' => 0,
                'ar_name' => 'عنوان البانر الرئيسي بالعربي'
            ],
            [
                'id' => 22,
                'name' => 'ar_banner_sub_text',
                'content' => 'يحتوي موقعنا على مئات الدروس والفيديوهات',
                'ordering' => 0,
                'type' => 0,
                'ar_name' => 'محتوى البانر الرئيسي بالعربي'
            ],
            [
                'id' => 29,
                'name' => 'en_banner_main_text',
                'content' => '',
                'ordering' => 0,
                'type' => 0,
                'ar_name' => 'عنوان البانر الرئيسي بالانكليزي'
            ],
            [
                'id' => 30,
                'name' => 'tr_banner_main_text',
                'content' => '',
                'ordering' => 0,
                'type' => 0,
                'ar_name' => 'عنوان البانر الرئيسي بالتركي'
            ],
            [
                'id' => 31,
                'name' => 'en_banner_sub_text',
                'content' => '',
                'ordering' => 0,
                'type' => 0,
                'ar_name' => 'محتوى البانر الرئيسي بالانكليزي'
            ],
            [
                'id' => 32,
                'name' => 'tr_banner_sub_text',
                'content' => '',
                'ordering' => 0,
                'type' => 0,
                'ar_name' => 'محتوى البانر الرئيسي بالتركي'
            ],

            // المميزات
            [
                'id' => 33,
                'name' => 'ar_featured_title_1',
                'content' => '',
                'ordering' => 0,
                'type' => 0,
                'ar_name' => 'عنوان الخدمة 1 بالعربي'
            ],
            [
                'id' => 34,
                'name' => 'en_featured_title_1',
                'content' => 'عنوان انكليزي 1',
                'ordering' => 0,
                'type' => 0,
                'ar_name' => 'عنوان الخدمة 1 بالانكليزي'
            ],
            [
                'id' => 35,
                'name' => 'tr_featured_title_1',
                'content' => 'عنوان تركي 1',
                'ordering' => 0,
                'type' => 0,
                'ar_name' => 'عنوان الخدمة 1 بالتركي'
            ],
            [
                'id' => 36,
                'name' => 'ar_featured_title_2',
                'content' => 'قيمنا',
                'ordering' => 0,
                'type' => 0,
                'ar_name' => 'عنوان الخدمة 2 بالعربي'
            ],
            [
                'id' => 37,
                'name' => 'en_featured_title_2',
                'content' => 'عنوان انكليزي 2',
                'ordering' => 0,
                'type' => 0,
                'ar_name' => 'عنوان الخدمة 2 بالاتكليزي'
            ],
            [
                'id' => 38,
                'name' => 'tr_featured_title_2',
                'content' => 'عنوان تركي 2',
                'ordering' => 0,
                'type' => 0,
                'ar_name' => 'عنوان الخدمة 2 بالتركي'
            ],
            [
                'id' => 39,
                'name' => 'ar_featured_title_3',
                'content' => 'وسائلنا',
                'ordering' => 0,
                'type' => 0,
                'ar_name' => 'عنوان الخدمة 3 بالعربي'
            ],
            [
                'id' => 40,
                'name' => 'en_featured_title_3',
                'content' => 'عنوان انكليزي 3',
                'ordering' => 0,
                'type' => 0,
                'ar_name' => 'عنوان الخدمة 3 بالانكليزي'
            ],
            [
                'id' => 41,
                'name' => 'tr_featured_title_3',
                'content' => 'عنوان تركي 3',
                'ordering' => 0,
                'type' => 0,
                'ar_name' => 'عنوان الخدمة 3 بالتركي'
            ],
            [
                'id' => 42,
                'name' => 'ar_featured_content_1',
                'content' => 'ما يميزنا رقم 1',
                'ordering' => 0,
                'type' => 0,
                'ar_name' => 'محتوى الخدمة 1 بالعربي'
            ],
            [
                'id' => 43,
                'name' => 'en_featured_content_1',
                'content' => 'محتوى انكليزي 1',
                'ordering' => 0,
                'type' => 0,
                'ar_name' => 'محتوى الخدمة 1 بالانكليزي'
            ],
            [
                'id' => 44,
                'name' => 'tr_featured_content_1',
                'content' => 'محتوى تركي 1',
                'ordering' => 0,
                'type' => 0,
                'ar_name' => 'محتوى الخدمة 1 بالتركي'
            ],
            [
                'id' => 45,
                'name' => 'ar_featured_content_2',
                'content' => 'ما يميزنا رقم2',
                'ordering' => 0,
                'type' => 0,
                'ar_name' => 'محتوى الخدمة 2 بالعربي'
            ],
            [
                'id' => 46,
                'name' => 'en_featured_content_2',
                'content' => 'محتوى انكليزي 2',
                'ordering' => 0,
                'type' => 0,
                'ar_name' => 'محتوى الخدمة 2 بالانكليزي'
            ],
            [
                'id' => 47,
                'name' => 'tr_featured_content_2',
                'content' => 'محتوى تركي 2',
                'ordering' => 0,
                'type' => 0,
                'ar_name' => 'محتوى الخدمة 2 بالتركي'
            ],
            [
                'id' => 48,
                'name' => 'ar_featured_content_3',
                'content' => 'ما يميزنا رقم 2',
                'ordering' => 0,
                'type' => 0,
                'ar_name' => 'محتوى الخدمة 3 بالعربي'
            ],
            [
                'id' => 49,
                'name' => 'en_featured_content_3',
                'content' => 'محتوى انكليزي 3',
                'ordering' => 0,
                'type' => 0,
                'ar_name' => 'محتوى الخدمة 3 بالانكليزي'
            ],
            [
                'id' => 50,
                'name' => 'tr_featured_content_3',
                'content' => 'محتوى تركي 3',
                'ordering' => 0,
                'type' => 0,
                'ar_name' => 'محتوى الخدمة 3 بالتركي'
            ],

            // الألوان
            [
                'id' => 54,
                'name' => 'main_color',
                'content' => '#11324D',
                'ordering' => 100,
                'type' => 0,
                'ar_name' => 'اللون الأساسي'
            ],
            [
                'id' => 55,
                'name' => 'title_color',
                'content' => '#11324D',
                'ordering' => 100,
                'type' => 0,
                'ar_name' => 'اللون الثانوي'
            ],
            [
                'id' => 56,
                'name' => 'buttons_color',
                'content' => '#000',
                'ordering' => 10,
                'type' => 0,
                'ar_name' => 'لون الأزرار'
            ],
            [
                'id' => 57,
                'name' => 'buttons_border_radius',
                'content' => '5',
                'ordering' => 10,
                'type' => 0,
                'ar_name' => 'حواف الازرار'
            ],
            [
                'id' => 58,
                'name' => 'nav_background',
                'content' => '#11324D',
                'ordering' => 10,
                'type' => 0,
                'ar_name' => 'لون خلفية القسم العلوي'
            ],
            [
                'id' => 59,
                'name' => 'header_links_color',
                'content' => '#C5A959',
                'ordering' => 10,
                'type' => 0,
                'ar_name' => 'لون الروابط في القسم العلوي'
            ],
            [
                'id' => 66,
                'name' => 'footer_bg_color',
                'content' => '#11324D',
                'ordering' => 100,
                'type' => 0,
                'ar_name' => 'لون خلفية القسم السفلي'
            ],

            // إعدادات النظام
            [
                'id' => 60,
                'name' => 'is_lms',
                'content' => '0',
                'ordering' => 100,
                'type' => 3,
                'ar_name' => 'موقع منصة'
            ],
            [
                'id' => 61,
                'name' => 'membership_active',
                'content' => '0',
                'ordering' => 100,
                'type' => 3,
                'ar_name' => 'تفعيل نظام العضوية'
            ],
            [
                'id' => 62,
                'name' => 'zoom_api_key',
                'content' => 'qjJ1RRTaRPyxBPYMV1zCfQ',
                'ordering' => 100,
                'type' => 0,
                'ar_name' => 'Zoom api key'
            ],
            [
                'id' => 63,
                'name' => 'zoom_api_secret_key',
                'content' => 'uo1XWo3kVcfuibYdZW2rmo4LTMnNKnei',
                'ordering' => 100,
                'type' => 0,
                'ar_name' => 'zoom_api_secret_key'
            ],
            [
                'id' => 64,
                'name' => 'slider_video_active',
                'content' => '0',
                'ordering' => 100,
                'type' => 3,
                'ar_name' => 'تفعيل فيديو في السلايدر'
            ],
            [
                'id' => 68,
                'name' => 'faqs_image_enable',
                'content' => '1',
                'ordering' => 100,
                'type' => 3,
                'ar_name' => 'تفعيل صورة الأسئلة الشائعة'
            ]
        ];

        DB::table('settings')->insert($settings);
    }
}
