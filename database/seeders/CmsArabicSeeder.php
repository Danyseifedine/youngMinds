<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CmsArabicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('c_m_s')->insert([
            // Hero section
            'hero_subtitle' => 'كل طفل يستحق أن يبرمج',
            'hero_title' => 'نبني قادة التقنية للغد',
            'hero_description' => 'اكتشف عالم الروبوتات والبرمجة بلغة الأردوينو والتقنيات المتطورة. نُمكّن العقول الشابة من الإبداع والابتكار وبناء المستقبل من خلال تجارب تعليمية عملية مع الروبوتات والبرمجة وتعليم العلوم والتقنية.',
            'hero_cta_button_text' => 'سجل الآن',

            // Second Section - Features
            'features_title' => 'عقول الروبوت الشابة',
            'features_subtitle' => 'نبني مبتكري الغد',
            'features_who_we_are_title' => 'من نحن',
            'features_who_we_are_text' => 'أكاديمية للروبوتات والعلوم التقنية للأطفال من عمر 5-14 سنة، نستخدم LEGO Education والأردوينو والبرمجة لجعل التعلم ممتعاً وشيّقاً.',
            'features_mission_title' => 'مهمتنا',
            'features_mission_text' => 'إشعال شرارة الفضول وبناء الثقة من خلال دمج اللعب بالتقنية لخلق حلّالي مشاكل المستقبل.',
            'features_vision_title' => 'رؤيتنا',
            'features_vision_text' => 'إلهام العقول الشابة ليصبحوا قادة في الابتكار والتقنية، وصناعة عالم أكثر إشراقاً.',
            'features_cta_text' => 'اكتشف المزيد',
            'features_feature1_title' => 'الإبداع والابتكار',
            'features_feature1_text' => 'تنمية التفكير الإبداعي وحل المشكلات بطرق مبتكرة من خلال مشاريع الروبوتات العملية.',
            'features_feature2_title' => 'العمل الجماعي والتعاون',
            'features_feature2_text' => 'بناء مهارات التواصل وقدرات حل المشكلات التعاونية من خلال المشاريع الجماعية.',
            'features_feature3_title' => 'تعلم ممتع وتفاعلي',
            'features_feature3_text' => 'جعل مفاهيم العلوم والتقنية المعقدة سهلة وممتعة من خلال التعلم القائم على اللعب.',
            'features_feature4_title' => 'مهارات جاهزة للمستقبل',
            'features_feature4_text' => 'تطوير التفكير النقدي والمهارات التقنية اللازمة لعالم الغد المدفوع بالتقنية.',

            // Third Section - Advanced Features
            'advanced_features_title_before_highlighted_word' => 'لماذا',
            'advanced_features_title_highlighted_word' => 'تختارنا',
            'advanced_features_title_after_highlighted_word' => '؟',
            'advanced_features_feature1_title' => 'مدربون ذوو خبرة',
            'advanced_features_feature1_text' => 'تعلم من معلمي STEM المعتمدين ذوي سنوات من الخبرة في تعليم الروبوتات والتقنية.',
            'advanced_features_feature2_title' => 'تعلم تفاعلي بأدوات عالمية',
            'advanced_features_feature2_text' => 'خبرة عملية مع LEGO WeDo و EV3 والأردوينو ومنصات الروبوتات المتطورة.',
            'advanced_features_feature3_title' => 'بيئة آمنة ومُشجّعة',
            'advanced_features_feature3_text' => 'مساحة رعاية حيث يشعر الأطفال بالثقة للاستكشاف والتجريب والخطأ بأمان.',
            'advanced_features_feature4_title' => 'دورات مُصممة لجميع الأعمار',
            'advanced_features_feature4_text' => 'منهج مناسب للعمر مُصمم لتحدي وإشراك الأطفال من 5-14 سنة.',
            'advanced_features_additional_info_title' => 'جاهز لبدء رحلتك في عالم الروبوتات؟',
            'advanced_features_additional_subtitle' => 'انضم إلى مئات المبتكرين الشباب الذين يبنون المستقبل بالفعل!',
            'advanced_features_additional_cta_button_text' => 'ابدأ اليوم',

            // Fourth Section - Courses
            'courses_title_before_highlighted_word' => 'البرامج',
            'courses_title_highlighted_word' => 'والدورات',
            'courses_title_after_highlighted_word' => '',
            'course_badge_title' => 'عقول الروبوت الشابة',
            'course_badge_sub_title' => 'أكاديمية الروبوتات',
            'course_age_card_1_title' => 'الأعمار 5-7: LEGO WeDo',
            'course_age_card_1_sub_title' => 'المستوى التأسيسي',
            'course_age_card_1_point_1' => 'بناء روبوتات بسيطة باستخدام مجموعات LEGO WeDo',
            'course_age_card_1_point_2' => 'تعلم البرمجة الأساسية بنظام السحب والإفلات',
            'course_age_card_1_point_3' => 'تنمية الإبداع والمهارات الحركية والعمل الجماعي',
            'course_age_card_1_outcome' => '👈 يبني الأطفال روبوتاتهم الأولى ويتعلمون كيف تجعل البرمجة الأشياء تتحرك!',
            'course_age_card_2_title' => 'الأعمار 8-11: LEGO EV3 و Scratch',
            'course_age_card_2_sub_title' => 'الروبوتات المتوسطة',
            'course_age_card_2_point_1' => 'استكشاف روبوتات LEGO المتقدمة (حساسات، محركات)',
            'course_age_card_2_point_2' => 'البرمجة باستخدام Scratch وبرنامج LEGO. حل التحديات مثل تتبع الخط وتجنب العوائق',
            'course_age_card_2_point_3' => 'مشاريع فريق ومسابقات صغيرة',
            'course_age_card_2_outcome' => '👈 يصمم الأطفال ويبرمجون ويختبرون روبوتات تستطيع التفكير والتفاعل!',
            'course_age_card_3_title' => 'الأعمار 12-14+: أردوينو وبايثون',
            'course_age_card_3_sub_title' => 'الروبوتات والبرمجة المتقدمة',
            'course_age_card_3_point_1' => 'مقدمة في الإلكترونيات مع الأردوينو. تعلم البرمجة بلغة بايثون للروبوتات',
            'course_age_card_3_point_2' => 'بناء مشاريع ذكية (إشارات المرور، الحساسات، السيارات الذكية)',
            'course_age_card_3_point_3' => 'استكشاف الهندسة وحل المشكلات في العالم الحقيقي',
            'course_age_card_3_outcome' => '👈 يكتسب المراهقون مهارات البرمجة والإلكترونيات لمهن STEM المستقبلية!',

            // Fifth Section - Students
            'students_title_before_highlighted_word' => 'طلابنا',
            'students_title_highlighted_word' => 'المبدعون',
            'students_title_after_highlighted_word' => '',

            // Sixth Section - Events
            'events_title_before_highlighted_word' => 'الفعاليات',
            'events_title_highlighted_word' => 'القادمة',
            'events_title_after_highlighted_word' => ' وورش العمل',
            'events_subtitle' => 'انضم إلى ورش العمل والفعاليات المثيرة المصممة لإلهام الإبداع والتعلم في الروبوتات والبرمجة.',

            // Seventh Section - About Us
            'about_us_heading' => 'من نحن',
            'about_us_title' => 'نبرمج المستقبل اليوم',
            'about_us_text' => 'عقول شابة مُكرّسة لإلهام الجيل القادم من المبتكرين من خلال تعليم الروبوتات والبرمجة التفاعلية. نؤمن أن كل طفل لديه القدرة على أن يصبح صانعاً للتقنية.',
            'about_us_point_1' => 'برمجة الأردوينو وأساسيات الروبوتات من المبتدئين إلى المتقدمين',
            'about_us_point_2' => 'مسارات تعليمية منظمة تبني التفكير الحاسوبي ومهارات حل المشكلات',
            'about_us_cta_button_text' => 'انضم إلينا',

            // Eighth Section - Stats
            'stats_heading' => 'تأثيرنا',
            'stats_title' => 'أرقام مذهلة',
            'stats_text' => 'انضم إلى مجتمعنا المتنامي من مبتكري التقنية الشباب الذين يبنون المستقبل!',
            'stats_stat1_number' => '7',
            'stats_stat1_title' => 'معلمون خبراء',
            'stats_stat1_text' => 'مدربو روبوتات وبرمجة معتمدون',
            'stats_stat2_number' => '6',
            'stats_stat2_title' => 'دورات تقنية',
            'stats_stat2_text' => 'دورات أردوينو وروبوتات وبرمجة',
            'stats_stat3_number' => '10',
            'stats_stat3_title' => 'طلاب نشطون',
            'stats_stat3_text' => 'عقول شابة تتعلم وتبدع',
            'stats_additional_info_title' => 'جاهز للانضمام إلى مجتمعنا؟',
            'stats_additional_info_subtitle' => 'ابدأ رحلتك في الروبوتات والبرمجة اليوم!',
            'stats_additional_info_cta_button_text' => 'ابدأ الآن',

            // Ninth Section - Advanced
            'advanced_heading' => 'تقنية متطورة',
            'advanced_title' => 'منصة تعلم تفاعلية',
            'advanced_text' => 'منصتنا التعليمية المتطورة تجمع بين المحاكاة الافتراضية والأجهزة الحقيقية، مما يسمح للطلاب ببرمجة لوحات الأردوينو وبناء الروبوتات واختبار إبداعاتهم في البيئات الرقمية والحقيقية.',
            'advanced_point_1_title' => 'برمج من أي مكان',
            'advanced_point_1_description' => 'استخدم بيئة تطوير الأردوينو ومحاكيات الروبوت من أي مكان بأدوات البرمجة السحابية',
            'advanced_point_2_title' => 'موجهو الروبوتات',
            'advanced_point_2_description' => 'تعلم من مهندسي الروبوتات المعتمدين ومدربي البرمجة ذوي الخبرة',

            // Tenth Section - Footer
            'footer_title' => 'عن التقنية',
            'footer_text' => 'نُمكّن الجيل القادم بالخبرة العملية في الروبوتات والبرمجة والتقنية المبتكرة. انضم إلى مجتمعنا لاستكشاف مستقبل التقنية، من الأردوينو إلى الذكاء الاصطناعي، واكتشف إمكانيات لا محدودة!',

            'lang' => 'ar',

            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
