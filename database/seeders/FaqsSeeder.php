<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class FaqsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('faqs')->insert([
            [
                'ar_qs' => 'ما هي عملية بناء المواقع الإلكترونية؟',
                'en_qs' => 'What is the website development process?',
                'fr_qs' => 'Quel est le processus de développement de site web?',
                'ar_answer' => 'تشمل عملية بناء المواقع الإلكترونية التخطيط، التصميم، البرمجة، والاختبار قبل الإطلاق.',
                'en_answer' => 'The website development process includes planning, design, programming, and testing before launch.',
                'fr_answer' => 'Le processus de développement de sites web comprend la planification, la conception, la programmation et les tests avant le lancement.',
                'ordering' => 1,
                'de_qs' => 'Was ist der Prozess der Webentwicklung?',
                'de_answer' => 'Der Webentwicklungsprozess umfasst Planung, Design, Programmierung und Tests vor dem Start.',
                'tr_qs' => 'Web sitesi geliştirme süreci nedir?',
                'tr_answer' => 'Web sitesi geliştirme süreci, planlama, tasarım, programlama ve lansmandan önce test etmeyi içerir.',
                'sw_qs' => 'Ni mchakato wa uundaji wa tovuti?',
                'sw_answer' => 'Mchakato wa uundaji wa tovuti unajumuisha upangaji, muundo, uandishi wa programu na majaribio kabla ya uzinduzi.',
            ],
            // سؤال متعلق بـ "التسويق الرقمي"
            [
                'ar_qs' => 'كيف يعمل التسويق الرقمي؟',
                'en_qs' => 'How does digital marketing work?',
                'fr_qs' => 'Comment fonctionne le marketing digital?',
                'ar_answer' => 'التسويق الرقمي يشمل استخدام الإنترنت ووسائل التواصل الاجتماعي للوصول إلى العملاء المستهدفين من خلال الإعلانات والمحتوى.',
                'en_answer' => 'Digital marketing involves using the internet and social media to reach target customers through ads and content.',
                'fr_answer' => 'Le marketing digital consiste à utiliser Internet et les réseaux sociaux pour atteindre les clients cibles via des publicités et du contenu.',
                'ordering' => 2,
                'de_qs' => 'Wie funktioniert digitales Marketing?',
                'de_answer' => 'Digitales Marketing beinhaltet die Nutzung des Internets und sozialer Medien, um Zielkunden durch Werbung und Inhalte zu erreichen.',
                'tr_qs' => 'Dijital pazarlama nasıl çalışır?',
                'tr_answer' => 'Dijital pazarlama, hedef müşterilere reklamlar ve içerikler aracılığıyla interneti ve sosyal medyayı kullanarak ulaşmayı içerir.',
                'sw_qs' => 'Jinsi gani masoko ya dijitali hufanya kazi?',
                'sw_answer' => 'Masoko ya dijitali yanahusisha matumizi ya mtandao na mitandao ya kijamii kufikia wateja waliolengwa kupitia matangazo na maudhui.',
            ],
            [
                'ar_qs' => 'ما هو تحسين محركات البحث (SEO)؟',
                'en_qs' => 'What is SEO (Search Engine Optimization)?',
                'fr_qs' => 'Qu\'est-ce que le SEO (Optimisation pour les moteurs de recherche) ?',
                'ar_answer' => 'تحسين محركات البحث هو عملية تحسين موقع الويب لزيادة ظهوره في نتائج محركات البحث مثل جوجل.',
                'en_answer' => 'SEO is the process of optimizing a website to increase its visibility in search engine results like Google.',
                'fr_answer' => 'Le SEO est le processus d\'optimisation d\'un site Web pour augmenter sa visibilité dans les résultats des moteurs de recherche tels que Google.',
                'ordering' => 3,
                'de_qs' => 'Was ist SEO (Suchmaschinenoptimierung)?',
                'de_answer' => 'SEO ist der Prozess der Optimierung einer Website, um ihre Sichtbarkeit in den Suchergebnissen von Suchmaschinen wie Google zu erhöhen.',
                'tr_qs' => 'SEO (Arama Motoru Optimizasyonu) nedir?',
                'tr_answer' => 'SEO, bir web sitesinin Google gibi arama motorlarındaki görünürlüğünü artırmak için yapılan optimizasyon işlemidir.',
                'sw_qs' => 'Nini SEO (Uboreshaji wa Injini za Utafutaji)?',
                'sw_answer' => 'SEO ni mchakato wa kuboresha tovuti ili kuongeza mwonekano wake katika matokeo ya injini za utafutaji kama Google.',
            ],
            [
                'ar_qs' => 'ما هي خدمات تصميم الجرافيك؟',
                'en_qs' => 'What are graphic design services?',
                'fr_qs' => 'Qu\'est-ce que les services de design graphique?',
                'ar_answer' => 'تصميم الجرافيك يشمل تصميم الشعارات، الهويات البصرية، الإعلانات، والمحتوى للوسائط الرقمية.',
                'en_answer' => 'Graphic design services include logo design, visual identity creation, advertisements, and content for digital media.',
                'fr_answer' => 'Les services de design graphique incluent la création de logos, d\'identité visuelle, de publicités et de contenu pour les médias numériques.',
                'ordering' => 4,
                'de_qs' => 'Was sind Grafikdesign-Dienstleistungen?',
                'de_answer' => 'Grafikdesign-Dienstleistungen umfassen Logo-Design, visuelle Identität, Werbung und Inhalte für digitale Medien.',
                'tr_qs' => 'Grafik tasarım hizmetleri nedir?',
                'tr_answer' => 'Grafik tasarım hizmetleri, logo tasarımı, görsel kimlik oluşturma, reklamlar ve dijital medya için içerik oluşturmayı içerir.',
                'sw_qs' => 'Nini huduma za muundo wa picha?',
                'sw_answer' => 'Huduma za muundo wa picha zinajumuisha muundo wa nembo, uundaji wa utambulisho wa kuona, matangazo, na maudhui kwa vyombo vya habari vya dijitali.',
            ],
        ]);
    }
}
