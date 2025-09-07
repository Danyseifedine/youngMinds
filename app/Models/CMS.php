<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class CMS extends Model
{
    use AsSource, Filterable;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'c_m_s';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        // Hero section
        'hero_subtitle',
        'hero_title',
        'hero_description',
        'hero_cta_button_text',
        'hero_image',

        // Second Section - Features
        'features_title',
        'features_subtitle',
        'features_who_we_are_title',
        'features_who_we_are_text',
        'features_mission_title',
        'features_mission_text',
        'features_vision_title',
        'features_vision_text',
        'features_cta_text',
        'features_feature1_title',
        'features_feature1_text',
        'features_feature2_title',
        'features_feature2_text',
        'features_feature3_title',
        'features_feature3_text',
        'features_feature4_title',
        'features_feature4_text',

        // Third Section - Advanced Features
        'advanced_features_title_before_highlighted_word',
        'advanced_features_title_highlighted_word',
        'advanced_features_title_after_highlighted_word',
        'advanced_features_feature1_title',
        'advanced_features_feature1_text',
        'advanced_features_feature2_title',
        'advanced_features_feature2_text',
        'advanced_features_feature3_title',
        'advanced_features_feature3_text',
        'advanced_features_feature4_title',
        'advanced_features_feature4_text',
        'advanced_features_additional_info_title',
        'advanced_features_additional_subtitle',
        'advanced_features_additional_cta_button_text',

        // Fourth Section - Courses
        'courses_title_before_highlighted_word',
        'courses_title_highlighted_word',
        'courses_title_after_highlighted_word',
        'course_badge_title',
        'course_badge_sub_title',
        'course_age_card_1_title',
        'course_age_card_1_sub_title',
        'course_age_card_1_point_1',
        'course_age_card_1_point_2',
        'course_age_card_1_point_3',
        'course_age_card_1_outcome',
        'course_age_card_2_title',
        'course_age_card_2_sub_title',
        'course_age_card_2_point_1',
        'course_age_card_2_point_2',
        'course_age_card_2_point_3',
        'course_age_card_2_outcome',
        'course_age_card_3_title',
        'course_age_card_3_sub_title',
        'course_age_card_3_point_1',
        'course_age_card_3_point_2',
        'course_age_card_3_point_3',
        'course_age_card_3_outcome',

        // Fifth Section - Students
        'students_title_before_highlighted_word',
        'students_title_highlighted_word',
        'students_title_after_highlighted_word',

        // Sixth Section - Events
        'events_title_before_highlighted_word',
        'events_title_highlighted_word',
        'events_title_after_highlighted_word',
        'events_subtitle',

        // Seventh Section - About Us
        'about_us_heading',
        'about_us_title',
        'about_us_text',
        'about_us_point_1',
        'about_us_point_2',
        'about_us_cta_button_text',
        'about_image',

        // Eighth Section - Stats
        'stats_heading',
        'stats_title',
        'stats_text',
        'stats_stat1_number',
        'stats_stat1_title',
        'stats_stat1_text',
        'stats_stat2_number',
        'stats_stat2_title',
        'stats_stat2_text',
        'stats_stat3_number',
        'stats_stat3_title',
        'stats_stat3_text',
        'stats_additional_info_title',
        'stats_additional_info_subtitle',
        'stats_additional_info_cta_button_text',

        // Ninth Section - Advanced
        'advanced_heading',
        'advanced_title',
        'advanced_text',
        'advanced_point_1_title',
        'advanced_point_1_description',
        'advanced_point_2_title',
        'advanced_point_2_description',
        'advanced_section_image',

        // Tenth Section - Footer
        'footer_title',
        'footer_text',
    ];
}
