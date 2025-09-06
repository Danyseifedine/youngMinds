<?php

namespace App\Orchid\Screens;

use App\Models\CMS;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class CMSEditScreen extends Screen
{
    /**
     * @var CMS
     */
    public $cms;

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        $cms = CMS::first();
        
        // Create CMS record if it doesn't exist
        if (!$cms) {
            $cms = CMS::create([]);
        }

        return [
            'cms' => $cms
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Website Content Management';
    }

    /**
     * Display header description.
     *
     * @return string|null
     */
    public function description(): ?string
    {
        return 'Edit all website content and copy across all sections';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make('Save Changes')
                ->icon('bs.check')
                ->method('save')
                ->class('btn btn-success'),
        ];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            Layout::tabs([
                'Hero Section' => Layout::rows([
                    Input::make('cms.hero_subtitle')
                        ->title('Hero Subtitle')
                        ->placeholder('Enter hero subtitle')
                        ->help('Small text above the main title'),

                    Input::make('cms.hero_title')
                        ->title('Hero Title')
                        ->placeholder('Enter main hero title')
                        ->help('Main headline on the homepage'),

                    TextArea::make('cms.hero_description')
                        ->title('Hero Description')
                        ->placeholder('Enter hero description')
                        ->rows(3)
                        ->help('Description text below the hero title'),

                    Input::make('cms.hero_cta_button_text')
                        ->title('Hero Call-to-Action Button Text')
                        ->placeholder('e.g., Get Started, Learn More')
                        ->help('Text for the main action button'),
                ]),

                'Features Section' => Layout::rows([
                    Input::make('cms.features_title')
                        ->title('Section Title')
                        ->placeholder('Enter features section title'),

                    Input::make('cms.features_subtitle')
                        ->title('Section Subtitle')
                        ->placeholder('Enter features section subtitle'),

                    // Who We Are
                    Input::make('cms.features_who_we_are_title')
                        ->title('Who We Are - Title')
                        ->placeholder('Enter who we are title'),

                    TextArea::make('cms.features_who_we_are_text')
                        ->title('Who We Are - Text')
                        ->rows(3)
                        ->placeholder('Enter who we are description'),

                    // Mission
                    Input::make('cms.features_mission_title')
                        ->title('Mission - Title')
                        ->placeholder('Enter mission title'),

                    TextArea::make('cms.features_mission_text')
                        ->title('Mission - Text')
                        ->rows(3)
                        ->placeholder('Enter mission description'),

                    // Vision
                    Input::make('cms.features_vision_title')
                        ->title('Vision - Title')
                        ->placeholder('Enter vision title'),

                    TextArea::make('cms.features_vision_text')
                        ->title('Vision - Text')
                        ->rows(3)
                        ->placeholder('Enter vision description'),

                    Input::make('cms.features_cta_text')
                        ->title('Features CTA Text')
                        ->placeholder('Enter call-to-action text'),

                    // Feature Cards
                    Input::make('cms.features_feature1_title')
                        ->title('Feature 1 - Title')
                        ->placeholder('Enter first feature title'),

                    TextArea::make('cms.features_feature1_text')
                        ->title('Feature 1 - Text')
                        ->rows(2)
                        ->placeholder('Enter first feature description'),

                    Input::make('cms.features_feature2_title')
                        ->title('Feature 2 - Title')
                        ->placeholder('Enter second feature title'),

                    TextArea::make('cms.features_feature2_text')
                        ->title('Feature 2 - Text')
                        ->rows(2)
                        ->placeholder('Enter second feature description'),

                    Input::make('cms.features_feature3_title')
                        ->title('Feature 3 - Title')
                        ->placeholder('Enter third feature title'),

                    TextArea::make('cms.features_feature3_text')
                        ->title('Feature 3 - Text')
                        ->rows(2)
                        ->placeholder('Enter third feature description'),

                    Input::make('cms.features_feature4_title')
                        ->title('Feature 4 - Title')
                        ->placeholder('Enter fourth feature title'),

                    TextArea::make('cms.features_feature4_text')
                        ->title('Feature 4 - Text')
                        ->rows(2)
                        ->placeholder('Enter fourth feature description'),
                ]),

                'Advanced Features' => Layout::rows([
                    // Split title with highlighted word
                    Input::make('cms.advanced_features_title_before_highlighted_word')
                        ->title('Title - Before Highlighted Word')
                        ->placeholder('Text before the highlighted word'),

                    Input::make('cms.advanced_features_title_highlighted_word')
                        ->title('Title - Highlighted Word')
                        ->placeholder('The word to be highlighted')
                        ->help('This word will be styled differently'),

                    Input::make('cms.advanced_features_title_after_highlighted_word')
                        ->title('Title - After Highlighted Word')
                        ->placeholder('Text after the highlighted word'),

                    // Advanced Features
                    Input::make('cms.advanced_features_feature1_title')
                        ->title('Advanced Feature 1 - Title'),

                    TextArea::make('cms.advanced_features_feature1_text')
                        ->title('Advanced Feature 1 - Text')
                        ->rows(2),

                    Input::make('cms.advanced_features_feature2_title')
                        ->title('Advanced Feature 2 - Title'),

                    TextArea::make('cms.advanced_features_feature2_text')
                        ->title('Advanced Feature 2 - Text')
                        ->rows(2),

                    Input::make('cms.advanced_features_feature3_title')
                        ->title('Advanced Feature 3 - Title'),

                    TextArea::make('cms.advanced_features_feature3_text')
                        ->title('Advanced Feature 3 - Text')
                        ->rows(2),

                    Input::make('cms.advanced_features_feature4_title')
                        ->title('Advanced Feature 4 - Title'),

                    TextArea::make('cms.advanced_features_feature4_text')
                        ->title('Advanced Feature 4 - Text')
                        ->rows(2),

                    // Additional Info
                    Input::make('cms.advanced_features_additional_info_title')
                        ->title('Additional Info - Title'),

                    Input::make('cms.advanced_features_additional_subtitle')
                        ->title('Additional Info - Subtitle'),

                    Input::make('cms.advanced_features_additional_cta_button_text')
                        ->title('Additional Info - CTA Button Text'),
                ]),

                'Courses Section' => Layout::rows([
                    // Split title
                    Input::make('cms.courses_title_before_highlighted_word')
                        ->title('Courses Title - Before Highlighted Word'),

                    Input::make('cms.courses_title_highlighted_word')
                        ->title('Courses Title - Highlighted Word')
                        ->help('This word will be styled differently'),

                    Input::make('cms.courses_title_after_highlighted_word')
                        ->title('Courses Title - After Highlighted Word'),

                    // Course Badge
                    Input::make('cms.course_badge_title')
                        ->title('Course Badge - Title'),

                    Input::make('cms.course_badge_sub_title')
                        ->title('Course Badge - Subtitle'),

                    // Age Card 1
                    Input::make('cms.course_age_card_1_title')
                        ->title('Age Card 1 - Title'),

                    Input::make('cms.course_age_card_1_sub_title')
                        ->title('Age Card 1 - Subtitle'),

                    Input::make('cms.course_age_card_1_point_1')
                        ->title('Age Card 1 - Point 1'),

                    Input::make('cms.course_age_card_1_point_2')
                        ->title('Age Card 1 - Point 2'),

                    Input::make('cms.course_age_card_1_point_3')
                        ->title('Age Card 1 - Point 3'),

                    Input::make('cms.course_age_card_1_outcome')
                        ->title('Age Card 1 - Outcome'),

                    // Age Card 2
                    Input::make('cms.course_age_card_2_title')
                        ->title('Age Card 2 - Title'),

                    Input::make('cms.course_age_card_2_sub_title')
                        ->title('Age Card 2 - Subtitle'),

                    Input::make('cms.course_age_card_2_point_1')
                        ->title('Age Card 2 - Point 1'),

                    Input::make('cms.course_age_card_2_point_2')
                        ->title('Age Card 2 - Point 2'),

                    Input::make('cms.course_age_card_2_point_3')
                        ->title('Age Card 2 - Point 3'),

                    Input::make('cms.course_age_card_2_outcome')
                        ->title('Age Card 2 - Outcome'),

                    // Age Card 3
                    Input::make('cms.course_age_card_3_title')
                        ->title('Age Card 3 - Title'),

                    Input::make('cms.course_age_card_3_sub_title')
                        ->title('Age Card 3 - Subtitle'),

                    Input::make('cms.course_age_card_3_point_1')
                        ->title('Age Card 3 - Point 1'),

                    Input::make('cms.course_age_card_3_point_2')
                        ->title('Age Card 3 - Point 2'),

                    Input::make('cms.course_age_card_3_point_3')
                        ->title('Age Card 3 - Point 3'),

                    Input::make('cms.course_age_card_3_outcome')
                        ->title('Age Card 3 - Outcome'),
                ]),

                'Students & Events' => Layout::rows([
                    // Students Section
                    Input::make('cms.students_title_before_highlighted_word')
                        ->title('Students Title - Before Highlighted Word'),

                    Input::make('cms.students_title_highlighted_word')
                        ->title('Students Title - Highlighted Word')
                        ->help('This word will be styled differently'),

                    Input::make('cms.students_title_after_highlighted_word')
                        ->title('Students Title - After Highlighted Word'),

                    // Events Section
                    Input::make('cms.events_title_before_highlighted_word')
                        ->title('Events Title - Before Highlighted Word'),

                    Input::make('cms.events_title_highlighted_word')
                        ->title('Events Title - Highlighted Word')
                        ->help('This word will be styled differently'),

                    Input::make('cms.events_title_after_highlighted_word')
                        ->title('Events Title - After Highlighted Word'),

                    Input::make('cms.events_subtitle')
                        ->title('Events Subtitle'),
                ]),

                'About Us' => Layout::rows([
                    Input::make('cms.about_us_heading')
                        ->title('About Us - Heading')
                        ->placeholder('Small heading above title'),

                    Input::make('cms.about_us_title')
                        ->title('About Us - Title')
                        ->placeholder('Main about us title'),

                    TextArea::make('cms.about_us_text')
                        ->title('About Us - Description')
                        ->rows(4)
                        ->placeholder('About us description text'),

                    Input::make('cms.about_us_point_1')
                        ->title('About Us - Point 1')
                        ->placeholder('First key point'),

                    Input::make('cms.about_us_point_2')
                        ->title('About Us - Point 2')
                        ->placeholder('Second key point'),

                    Input::make('cms.about_us_cta_button_text')
                        ->title('About Us - CTA Button Text')
                        ->placeholder('Call-to-action button text'),
                ]),

                'Statistics' => Layout::rows([
                    Input::make('cms.stats_heading')
                        ->title('Stats - Heading')
                        ->placeholder('Stats section heading'),

                    Input::make('cms.stats_title')
                        ->title('Stats - Title')
                        ->placeholder('Stats section title'),

                    TextArea::make('cms.stats_text')
                        ->title('Stats - Description')
                        ->rows(3)
                        ->placeholder('Stats section description'),

                    // Stat 1
                    Input::make('cms.stats_stat1_number')
                        ->title('Statistic 1 - Number')
                        ->placeholder('e.g., 100+, 50K, etc.'),

                    Input::make('cms.stats_stat1_title')
                        ->title('Statistic 1 - Title'),

                    Input::make('cms.stats_stat1_text')
                        ->title('Statistic 1 - Description'),

                    // Stat 2
                    Input::make('cms.stats_stat2_number')
                        ->title('Statistic 2 - Number'),

                    Input::make('cms.stats_stat2_title')
                        ->title('Statistic 2 - Title'),

                    Input::make('cms.stats_stat2_text')
                        ->title('Statistic 2 - Description'),

                    // Stat 3
                    Input::make('cms.stats_stat3_number')
                        ->title('Statistic 3 - Number'),

                    Input::make('cms.stats_stat3_title')
                        ->title('Statistic 3 - Title'),

                    Input::make('cms.stats_stat3_text')
                        ->title('Statistic 3 - Description'),

                    // Additional Info
                    Input::make('cms.stats_additional_info_title')
                        ->title('Stats Additional Info - Title'),

                    Input::make('cms.stats_additional_info_subtitle')
                        ->title('Stats Additional Info - Subtitle'),

                    Input::make('cms.stats_additional_info_cta_button_text')
                        ->title('Stats Additional Info - CTA Button'),
                ]),

                'Advanced Section' => Layout::rows([
                    Input::make('cms.advanced_heading')
                        ->title('Advanced - Heading')
                        ->placeholder('Advanced section heading'),

                    Input::make('cms.advanced_title')
                        ->title('Advanced - Title')
                        ->placeholder('Advanced section title'),

                    TextArea::make('cms.advanced_text')
                        ->title('Advanced - Description')
                        ->rows(3)
                        ->placeholder('Advanced section description'),

                    // Point 1
                    Input::make('cms.advanced_point_1_title')
                        ->title('Advanced Point 1 - Title'),

                    TextArea::make('cms.advanced_point_1_description')
                        ->title('Advanced Point 1 - Description')
                        ->rows(2),

                    // Point 2
                    Input::make('cms.advanced_point_2_title')
                        ->title('Advanced Point 2 - Title'),

                    TextArea::make('cms.advanced_point_2_description')
                        ->title('Advanced Point 2 - Description')
                        ->rows(2),
                ]),

                'Footer' => Layout::rows([
                    Input::make('cms.footer_title')
                        ->title('Footer - Title')
                        ->placeholder('Footer title/heading'),

                    TextArea::make('cms.footer_text')
                        ->title('Footer - Text')
                        ->rows(3)
                        ->placeholder('Footer description text'),
                ])
            ])
        ];
    }

    /**
     * Save CMS content.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save(Request $request)
    {
        $cmsData = $request->get('cms');
        
        $cms = CMS::first();
        if (!$cms) {
            $cms = new CMS();
        }

        $cms->fill($cmsData)->save();

        Toast::success('Website content has been updated successfully!');

        return redirect()->route('platform.cms');
    }
}