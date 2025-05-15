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
                'ordering' => 2,
                'effect_id' => $effects['fade'] ?? null,
                'duration' => null,
                'settings' => '{}'
            ],
            [
                'name' => 'العدادات',
                'active' => true,
                'file_name' => 'counter_area',
                'ordering' => 4,
                'effect_id' => $effects['بدون حركة'] ?? null,
                'duration' => null,
                'settings' => '{}'
            ],
            [
                'name' => 'الآراء',
                'active' => true,
                'file_name' => 'feedback',
                'ordering' => 5,
                'effect_id' => $effects['fade-up'] ?? null,
                'duration' => '20',
                'settings' => '{}'
            ],
            [
                'name' => 'المقالات',
                'active' => true,
                'file_name' => 'blog',
                'ordering' => 6,
                'effect_id' => $effects['fade'] ?? null,
                'duration' => null,
                'settings' => '{}'
            ],
            [
                'name' => 'الأسئلة الشائعة',
                'active' => true,
                'file_name' => 'faqs',
                'ordering' => 7,
                'effect_id' => $effects['flip-left'] ?? null,
                'duration' => '1000',
                'settings' => '{}'
            ],
            [
                'name' => 'أهم الدورات',
                'active' => true,
                'file_name' => 'popular_courses',
                'ordering' => 3,
                'effect_id' => $effects['zoom-in'] ?? null,
                'duration' => null,
                'settings' => '{}'
            ],
            [
                'name' => 'معرض الصور',
                'active' => true,
                'file_name' => 'gallary',
                'ordering' => 16,
                'effect_id' => $effects['zoom-in-up'] ?? null,
                'duration' => '5000',
                'settings' => '{}'
            ],
            [
                'name' => 'عملاؤنا',
                'active' => true,
                'file_name' => 'partners',
                'ordering' => 17,
                'effect_id' => $effects['fade-left'] ?? null,
                'duration' => null,
                'settings' => '{}'
            ],
            [
                'name' => 'الخريطة',
                'active' => true,
                'file_name' => 'map',
                'ordering' => 19,
                'effect_id' => $effects['zoom-out'] ?? null,
                'duration' => null,
                'settings' => '{}'
            ],
            [
                'name' => 'اتصل بنا',
                'active' => true,
                'file_name' => 'contact_us',
                'ordering' => 20,
                'effect_id' => $effects['flip-up'] ?? null,
                'duration' => null,
                'settings' => '{}'
            ],
            [
                'name' => 'من نحن',
                'active' => true,
                'file_name' => 'about_us',
                'ordering' => 18,
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
