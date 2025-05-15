<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class StoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('stories')->insert([
            [
                'name' => 'أحمد خالد',
                'spec' => 'كاتب خيال علمي',
                'content' => 'قصة ملهمة عن التحدي وتحقيق الذات في عالم الخيال.',
                'image' => 'frontend/seed/stories/feedback-img-1.jpg',
            ],
            [
                'name' => 'سارة منصور',
                'spec' => 'مهندسة معمارية',
                'content' => 'حكاية تصميم معماري غيّر وجه المدينة.',
                'image' => 'frontend/seed/stories/feedback-img-2.jpg',
            ],
            [
                'name' => 'ليلى يوسف',
                'spec' => 'رائدة أعمال',
                'content' => 'قصة نجاح بعد سلسلة من التحديات والصعوبات.',
                'image' => 'frontend/seed/stories/feedback-img-3.jpg',
            ],
        ]);
    }
}
