<?php
namespace Database\Seeders;

use App\Models\Effect;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HomepageWidgetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $effects = Effect::pluck('id', 'effect_name')->toArray();

        $widgets = [
            [
                'name' => 'السلايدر',
                'active' => true,
                'file_name' => 'banner',
                'ordering' => 0,
                'effect_id' => $effects['fade-down'] ?? null,
                'duration' => '600',
                'settings' => '{}'
            ],
            [
                'name' => 'خدماتنا',
                'active' => true,
                'file_name' => 'services',
                'ordering' => 4,
                'effect_id' => $effects['fade'] ?? null,
                'duration' => null,
                'settings' => '{}'
            ],
            [
                'name' => 'العدادات',
                'active' => false,
                'file_name' => 'counter_area',
                'ordering' => 5,
                'effect_id' => $effects['بدون حركة'] ?? null,
                'duration' => null,
                'settings' => '{}'
            ],
            [
                'name' => 'الآراء',
                'active' => true,
                'file_name' => 'testimonials',
                'ordering' => 7,
                'effect_id' => $effects['fade-up'] ?? null,
                'duration' => '20',
                'settings' => '{}'
            ],
            [
                'name' => 'المقالات',
                'active' => false,
                'file_name' => 'blog',
                'ordering' => 8,
                'effect_id' => $effects['fade'] ?? null,
                'duration' => null,
                'settings' => '{}'
            ],
            [
                'name' => 'الأسئلة الشائعة',
                'active' => true,
                'file_name' => 'faqs',
                'ordering' => 9,
                'effect_id' => $effects['flip-left'] ?? null,
                'duration' => '1000',
                'settings' => '{}'
            ],
            [
                'name' => 'أهم الدورات',
                'active' => false,
                'file_name' => 'popular_courses',
                'ordering' => 0,
                'effect_id' => $effects['zoom-in'] ?? null,
                'duration' => null,
                'settings' => '{}'
            ],
            [
                'name' => 'معرض الصور',
                'active' => false,
                'file_name' => 'gallary',
                'ordering' => 10,
                'effect_id' => $effects['zoom-in-up'] ?? null,
                'duration' => '5000',
                'settings' => '{}'
            ],
            [
                'name' => 'عملاؤنا',
                'active' => false,
                'file_name' => 'partners',
                'ordering' => 3,
                'effect_id' => $effects['fade-left'] ?? null,
                'duration' => null,
                'settings' => '{}'
            ],
            [
                'name' => 'الخريطة',
                'active' => true,
                'file_name' => 'map',
                'ordering' => 10,
                'effect_id' => $effects['zoom-out'] ?? null,
                'duration' => null,
                'settings' => '{}'
            ],
            [
                'name' => 'اتصل بنا',
                'active' => false,
                'file_name' => 'contact_us',
                'ordering' => 20,
                'effect_id' => $effects['flip-up'] ?? null,
                'duration' => null,
                'settings' => '{}'
            ],
            [
                'name' => 'من نحن',
                'active' => false,
                'file_name' => 'about_us',
                'ordering' => 1,
                'effect_id' => $effects['fade-up'] ?? null,
                'duration' => null,
                'settings' => '{"file_type":"", "url":""}'
            ]
        ];

        // إدخال البيانات إلى جدول homepage_widgets
        foreach ($widgets as $widget) {
            DB::table('homepage_widgets')->updateOrInsert(
                ['name' => $widget['name']],
                $widget
            );
        }
    }
}
