<?php

namespace App\Http\Controllers;

use App\Models\CMS;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $cms = CMS::first();

        $section1 = [
            'subtitle' => $cms->hero_subtitle,
            'title' => $cms->hero_title,
            'description' => $cms->hero_description,
            'cta_button_text' => $cms->hero_cta_button_text,
        ];

        $section2 = [
            'title' => $cms->features_title,
            'subtitle' => $cms->features_subtitle,
            'who_we_are_title' => $cms->features_who_we_are_title,
            'who_we_are_text' => $cms->features_who_we_are_text,
            'mission_title' => $cms->features_mission_title,
            'mission_text' => $cms->features_mission_text,
            'vision_title' => $cms->features_vision_title,
            'vision_text' => $cms->features_vision_text,
            'cta_text' => $cms->features_cta_text,
            'feature1_title' => $cms->features_feature1_title,
            'feature1_text' => $cms->features_feature1_text,
            'feature2_title' => $cms->features_feature2_title,
            'feature2_text' => $cms->features_feature2_text,
            'feature3_title' => $cms->features_feature3_title,
            'feature3_text' => $cms->features_feature3_text,
            'feature4_title' => $cms->features_feature4_title,
            'feature4_text' => $cms->features_feature4_text,
        ];

        $section3 = [
            'before_highlighted_word' => $cms->advanced_features_title_before_highlighted_word,
            'highlighted_word' => $cms->advanced_features_title_highlighted_word,
            'after_highlighted_word' => $cms->advanced_features_title_after_highlighted_word,
            'feature1_title' => $cms->advanced_features_feature1_title,
            'feature1_text' => $cms->advanced_features_feature1_text,
            'feature2_title' => $cms->advanced_features_feature2_title,
            'feature2_text' => $cms->advanced_features_feature2_text,
            'feature3_title' => $cms->advanced_features_feature3_title,
            'feature3_text' => $cms->advanced_features_feature3_text,
            'feature4_title' => $cms->advanced_features_feature4_title,
            'feature4_text' => $cms->advanced_features_feature4_text,
            'additional_title' => $cms->advanced_features_additional_info_title,
            'additional_subtitle' => $cms->advanced_features_additional_subtitle,
            'additional_cta_button_text' => $cms->advanced_features_additional_cta_button_text,
        ];

        $section4 = [
            'before_highlighted_word' => $cms->courses_title_before_highlighted_word,
            'highlighted_word' => $cms->courses_title_highlighted_word,
            'after_highlighted_word' => $cms->courses_title_after_highlighted_word,
            'subtitle' => $cms->courses_subtitle,
            'badge_title' => $cms->course_badge_title,
            'badge_subtitle' => $cms->course_badge_sub_title,
            'age_card_1_title' => $cms->course_age_card_1_title,
            'age_card_1_subtitle' => $cms->course_age_card_1_sub_title,
            'age_card_1_point_1' => $cms->course_age_card_1_point_1,
            'age_card_1_point_2' => $cms->course_age_card_1_point_2,
            'age_card_1_point_3' => $cms->course_age_card_1_point_3,
            'age_card_1_outcome' => $cms->course_age_card_1_outcome,
            'age_card_2_title' => $cms->course_age_card_2_title,
            'age_card_2_subtitle' => $cms->course_age_card_2_sub_title,
            'age_card_2_point_1' => $cms->course_age_card_2_point_1,
            'age_card_2_point_2' => $cms->course_age_card_2_point_2,
            'age_card_2_point_3' => $cms->course_age_card_2_point_3,
            'age_card_2_outcome' => $cms->course_age_card_2_outcome,
            'age_card_3_title' => $cms->course_age_card_3_title,
            'age_card_3_subtitle' => $cms->course_age_card_3_sub_title,
            'age_card_3_point_1' => $cms->course_age_card_3_point_1,
            'age_card_3_point_2' => $cms->course_age_card_3_point_2,
            'age_card_3_point_3' => $cms->course_age_card_3_point_3,
            'age_card_3_outcome' => $cms->course_age_card_3_outcome,
        ];

        $section5 = [
            'before_highlighted_word' => $cms->students_title_before_highlighted_word,
            'highlighted_word' => $cms->students_title_highlighted_word,
            'after_highlighted_word' => $cms->students_title_after_highlighted_word,
        ];

        $section6 = [
            'before_highlighted_word' => $cms->events_title_before_highlighted_word,
            'highlighted_word' => $cms->events_title_highlighted_word,
            'after_highlighted_word' => $cms->events_title_after_highlighted_word,
            'subtitle' => $cms->events_subtitle,
        ];

        $section7 = [
            'heading' => $cms->about_us_heading,
            'title' => $cms->about_us_title,
            'text' => $cms->about_us_text,
            'point_1' => $cms->about_us_point_1,
            'point_2' => $cms->about_us_point_2,
            'cta_button_text' => $cms->about_us_cta_button_text,
        ];

        $section8 = [
            'heading' => $cms->stats_heading,
            'title' => $cms->stats_title,
            'text' => $cms->stats_text,
            'stat1_number' => $cms->stats_stat1_number,
            'stat1_title' => $cms->stats_stat1_title,
            'stat1_text' => $cms->stats_stat1_text,
            'stat2_number' => $cms->stats_stat2_number,
            'stat2_title' => $cms->stats_stat2_title,
            'stat2_text' => $cms->stats_stat2_text,
            'stat3_number' => $cms->stats_stat3_number,
            'stat3_title' => $cms->stats_stat3_title,
            'stat3_text' => $cms->stats_stat3_text,
            'additional_info_title' => $cms->stats_additional_info_title,
            'additional_info_subtitle' => $cms->stats_additional_info_subtitle,
            'additional_info_cta_button_text' => $cms->stats_additional_info_cta_button_text,
        ];

        $section9 = [
            'heading' => $cms->advanced_heading,
            'title' => $cms->advanced_title,
            'text' => $cms->advanced_text,
            'point_1_title' => $cms->advanced_point_1_title,
            'point_1_description' => $cms->advanced_point_1_description,
            'point_2_title' => $cms->advanced_point_2_title,
            'point_2_description' => $cms->advanced_point_2_description,
        ];

        $section10 = [
            'title' => $cms->footer_title,
            'text' => $cms->footer_text,
        ];

        return view('welcome', compact('section1', 'section2', 'section3', 'section4', 'section5', 'section6', 'section7', 'section8', 'section9', 'section10'));
    }

}
