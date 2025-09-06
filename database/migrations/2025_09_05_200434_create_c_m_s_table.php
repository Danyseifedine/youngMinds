<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('c_m_s', function (Blueprint $table) {
            $table->id();

            // start Hero section
            $table->text('hero_subtitle')->nullable();
            $table->text('hero_title')->nullable();
            $table->text('hero_description')->nullable();
            $table->text('hero_cta_button_text')->nullable();
            //end Hero section

            // start Second Section
            $table->text('features_title')->nullable();
            $table->text('features_subtitle')->nullable();

            $table->text('features_who_we_are_title')->nullable();
            $table->text('features_who_we_are_text')->nullable();

            $table->text('features_mission_title')->nullable();
            $table->text('features_mission_text')->nullable();

            $table->text('features_vision_title')->nullable();
            $table->text('features_vision_text')->nullable();

            $table->text('features_cta_text')->nullable();

            $table->text('features_feature1_title')->nullable();
            $table->text('features_feature1_text')->nullable();

            $table->text('features_feature2_title')->nullable();
            $table->text('features_feature2_text')->nullable();

            $table->text('features_feature3_title')->nullable();
            $table->text('features_feature3_text')->nullable();

            $table->text('features_feature4_title')->nullable();
            $table->text('features_feature4_text')->nullable();
            //end Second Section

            // start Third Section
            $table->text('advanced_features_title_before_highlighted_word')->nullable();
            $table->text('advanced_features_title_highlighted_word')->nullable();
            $table->text('advanced_features_title_after_highlighted_word')->nullable();

            $table->text('advanced_features_feature1_title')->nullable();
            $table->text('advanced_features_feature1_text')->nullable();

            $table->text('advanced_features_feature2_title')->nullable();
            $table->text('advanced_features_feature2_text')->nullable();

            $table->text('advanced_features_feature3_title')->nullable();
            $table->text('advanced_features_feature3_text')->nullable();

            $table->text('advanced_features_feature4_title')->nullable();
            $table->text('advanced_features_feature4_text')->nullable();

            $table->text('advanced_features_additional_info_title')->nullable();
            $table->text('advanced_features_additional_subtitle')->nullable();
            $table->text('advanced_features_additional_cta_button_text')->nullable();
            //end Third Section

            // start Fourth Section
            $table->text('courses_title_before_highlighted_word')->nullable();
            $table->text('courses_title_highlighted_word')->nullable();
            $table->text('courses_title_after_highlighted_word')->nullable();

            $table->text('course_badge_title')->nullable();
            $table->text('course_badge_sub_title')->nullable();

            $table->text('course_age_card_1_title')->nullable();
            $table->text('course_age_card_1_sub_title')->nullable();
            $table->text('course_age_card_1_point_1')->nullable();
            $table->text('course_age_card_1_point_2')->nullable();
            $table->text('course_age_card_1_point_3')->nullable();
            $table->text('course_age_card_1_outcome')->nullable();

            $table->text('course_age_card_2_title')->nullable();
            $table->text('course_age_card_2_sub_title')->nullable();
            $table->text('course_age_card_2_point_1')->nullable();
            $table->text('course_age_card_2_point_2')->nullable();
            $table->text('course_age_card_2_point_3')->nullable();
            $table->text('course_age_card_2_outcome')->nullable();

            $table->text('course_age_card_3_title')->nullable();
            $table->text('course_age_card_3_sub_title')->nullable();
            $table->text('course_age_card_3_point_1')->nullable();
            $table->text('course_age_card_3_point_2')->nullable();
            $table->text('course_age_card_3_point_3')->nullable();
            $table->text('course_age_card_3_outcome')->nullable();
            //end Fourth Section

            //start Fifth Section
            $table->text('students_title_before_highlighted_word')->nullable();
            $table->text('students_title_highlighted_word')->nullable();
            $table->text('students_title_after_highlighted_word')->nullable();
            //end Fifth Section

            //start Sixth Section
            $table->text('events_title_before_highlighted_word')->nullable();
            $table->text('events_title_highlighted_word')->nullable();
            $table->text('events_title_after_highlighted_word')->nullable();

            $table->text('events_subtitle')->nullable();
            //end Sixth Section

            //start Seventh Section
            $table->text('about_us_heading')->nullable();
            $table->text('about_us_title')->nullable();
            $table->text('about_us_text')->nullable();
            $table->text('about_us_point_1')->nullable();
            $table->text('about_us_point_2')->nullable();
            $table->text('about_us_cta_button_text')->nullable();
            //end Seventh Section

            //start Eighth Section
            $table->text('stats_heading')->nullable();
                $table->text('stats_title')->nullable();
            $table->text('stats_text')->nullable();

            $table->text('stats_stat1_number')->nullable();
            $table->text('stats_stat1_title')->nullable();
            $table->text('stats_stat1_text')->nullable();

            $table->text('stats_stat2_number')->nullable();
            $table->text('stats_stat2_title')->nullable();
                $table->text('stats_stat2_text')->nullable();

            $table->text('stats_stat3_number')->nullable();
            $table->text('stats_stat3_title')->nullable();
            $table->text('stats_stat3_text')->nullable();

            $table->text('stats_additional_info_title')->nullable();
            $table->text('stats_additional_info_subtitle')->nullable();
            $table->text('stats_additional_info_cta_button_text')->nullable();
            //end Eighth Section

            //start Ninth Section
            $table->text('advanced_heading')->nullable();
            $table->text('advanced_title')->nullable();
            $table->text('advanced_text')->nullable();

            $table->text('advanced_point_1_title')->nullable();
            $table->text('advanced_point_1_description')->nullable();

            $table->text('advanced_point_2_title')->nullable();
            $table->text('advanced_point_2_description')->nullable();
            //end Ninth Section


            //start Tenth Section
            $table->text('footer_title')->nullable();
            $table->text('footer_text')->nullable();
            //end Tenth Section
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('c_m_s');
    }
};
