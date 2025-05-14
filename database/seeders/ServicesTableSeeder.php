<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('services')->insert([
            [
                'icon' => 'icon_services.png', // تعيين الأيقونة هنا
                'ar_name' => 'بناء المواقع الالكترونية',
                'en_name' => 'Building websites',
                'fr_name' => 'Erstellen von Websites',
                'ar_content' => 'خدمة نقدم نحن احترافية لإنشاء المواقع الإلكترونية، بتصاميم متميزة وتجربة مستخدم سلسة تلبي احتياجاتك وتحقق أهدافك الرقمية بكفاءة عالية',
                'en_content' => 'We provide a professional service for creating websites, with distinct designs and a smooth user experience that meets your needs and achieves your digital goals with high efficiency.',
                'fr_content' => 'Wir bieten einen professionellen Service für die Erstellung von Websites mit ausgeprägtem Design und einem reibungslosen Benutzererlebnis, der Ihren Anforderungen entspricht und Ihre digitalen Ziele mit hoher Effizienz erreicht.',
                'background_image' => 'images/1x1/us.svg',
                'link' => 'https://www.example.com/building-websites',
                'de_name' => 'Webseiten erstellen',
                'de_content' => 'Wir bieten einen professionellen Service zur Erstellung von Websites mit einzigartigem Design und einem reibungslosen Benutzererlebnis.',
            ],
            [
                'icon' => 'icon_services.png', // تعيين الأيقونة هنا
                'ar_name' => 'التسويق الرقمي',
                'en_name' => 'Digital marketing',
                'fr_name' => 'Digitales Marketing',
                'ar_content' => 'نقدم خدمات الحملات الإعلانية المبتكرة والشاملة. من الاستراتيجية إلى التصميم، نحن هنا لتحقيق أهدافك الإعلانية بكفاءة وفعالية.',
                'en_content' => 'We provide innovative and comprehensive advertising campaign services. From strategy to design, we are here to achieve your advertising goals efficiently and effectively.',
                'fr_content' => 'Wir bieten innovative und umfassende Werbekampagnendienste. Von der Strategie bis zum Design sind wir für Sie da, um Ihre Werbeziele effizient und effektiv zu erreichen.',
                'background_image' => 'images/1x1/marketing.svg',
                'link' => 'https://www.example.com/digital-marketing',
                'de_name' => 'Digitales Marketing',
                'de_content' => 'Wir bieten innovative und umfassende Werbekampagnendienste. Von der Strategie bis zum Design sind wir für Sie da, um Ihre Werbeziele effizient zu erreichen.',
            ],
            [
                'icon' => 'icon_services.png', // تعيين الأيقونة هنا
                'ar_name' => 'SEO',
                'en_name' => 'SEO',
                'fr_name' => 'SEO',
                'ar_content' => 'ابدأ رحلتك التجارية عبر الإنترنت اليوم مع متجر إلكتروني متكامل وجاهز للاستخدام. نقدم لك منصة سهلة الاستخدام، تصميم جذاب، وخدمات تسويقية متكاملة. انطلق نحو النجاح معنا.',
                'en_content' => 'Begin your online business journey today with a complete, ready-to-use online store. We provide you with a user-friendly platform, attractive design, and integrated marketing services. Let\'s head towards success together.',
                'fr_content' => 'Beginnen Sie noch heute Ihre Online-Geschäftsreise mit einem vollständigen, gebrauchsfertigen Online-Shop. Wir bieten Ihnen eine benutzerfreundliche Plattform, attraktives Design und integrierte Marketingdienstleistungen. Gehen Sie mit uns auf Erfolgskurs.',
                'background_image' => 'images/1x1/seo.svg',
                'link' => 'https://www.example.com/seo-services',
                'de_name' => 'SEO-Dienste',
                'de_content' => 'Beginnen Sie noch heute Ihre Online-Geschäftsreise mit einem vollständigen, gebrauchsfertigen Online-Shop und integrierten SEO-Diensten.',
            ],
        ]);

    }
}
