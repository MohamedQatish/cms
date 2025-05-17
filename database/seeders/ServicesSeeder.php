<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Service;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'name' => [
                    'ar' => 'بناء المواقع الإلكترونية',
                    'en' => 'Website Development',
                    'de' => 'Webseiten-Erstellung',
                ],
                'content' => [
                    'ar' => 'نقوم ببناء مواقع إلكترونية احترافية مخصصة لتلبية احتياجاتك.',
                    'en' => 'We build professional websites tailored to your needs.',
                    'de' => 'Wir erstellen professionelle Websites, die auf Ihre Bedürfnisse zugeschnitten sind.',
                ],
                'icon' => 'frontend/seed/services/web.png',
                'background_image' => 'images/1x1/web.svg',
                'link' => 'https://example.com/websites',
            ],
            [
                'name' => [
                    'ar' => 'التسويق الرقمي',
                    'en' => 'Digital Marketing',
                    'de' => 'Digitales Marketing',
                ],
                'content' => [
                    'ar' => 'نقدم حملات تسويق رقمي استراتيجية تضمن نتائج ملموسة.',
                    'en' => 'We offer strategic digital marketing campaigns with measurable results.',
                    'de' => 'Wir bieten strategische digitale Marketingkampagnen mit messbaren Ergebnissen.',
                ],
                'icon' => 'frontend/seed/services/marketing.png',
                'background_image' => 'images/1x1/marketing.svg',
                'link' => 'https://example.com/marketing',
            ],
            [
                'name' => [
                    'ar' => 'تحسين محركات البحث (SEO)',
                    'en' => 'Search Engine Optimization',
                    'de' => 'Suchmaschinenoptimierung',
                ],
                'content' => [
                    'ar' => 'اجعل موقعك في المراتب الأولى على جوجل بفضل خبراتنا في SEO.',
                    'en' => 'Rank higher on Google with our expert SEO services.',
                    'de' => 'Erreichen Sie bessere Google-Rankings mit unserem SEO-Know-how.',
                ],
                'icon' => 'frontend/seed/services/seo.png',
                'background_image' => 'images/1x1/seo.svg',
                'link' => 'https://example.com/seo',
            ],
            [
                'name' => [
                    'ar' => 'إدارة المحتوى',
                    'en' => 'Content Management',
                    'de' => 'Inhaltsverwaltung',
                ],
                'content' => [
                    'ar' => 'نقوم بإعداد وجدولة المحتوى وتحسينه ليتناسب مع جمهورك.',
                    'en' => 'We plan, schedule, and optimize content to engage your audience.',
                    'de' => 'Wir planen, erstellen und optimieren Inhalte für Ihr Publikum.',
                ],
                'icon' => 'frontend/seed/services/content.png',
                'background_image' => 'images/1x1/content.svg',
                'link' => 'https://example.com/content',
            ],
            [
                'name' => [
                    'ar' => 'تصميم الجرافيك',
                    'en' => 'Graphic Design',
                    'de' => 'Grafikdesign',
                ],
                'content' => [
                    'ar' => 'تصاميم مبهرة تعكس هوية علامتك التجارية بشكل احترافي.',
                    'en' => 'Stunning designs that reflect your brand identity professionally.',
                    'de' => 'Beeindruckende Designs, die Ihre Markenidentität professionell widerspiegeln.',
                ],
                'icon' => 'frontend/seed/services/design.png',
                'background_image' => 'images/1x1/design.svg',
                'link' => 'https://example.com/design',
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }

    }
}
