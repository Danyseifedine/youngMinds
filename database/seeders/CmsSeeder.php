<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CmsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('c_m_s')->insert([
            // Hero section
            'hero_subtitle' => 'Every child deserves to code',
            'hero_title' => 'Building Tomorrow\'s Tech Leaders',
            'hero_description' => 'Discover the world of robotics, Arduino programming, and cutting-edge technology. We empower young minds to create, innovate, and build the future through hands-on learning experiences with robots, coding, and STEM education.',
            'hero_cta_button_text' => 'Register Now',

            // Second Section - Features
            'features_title' => 'Young Bot Minds',
            'features_subtitle' => 'Building Tomorrow\'s Innovators',
            'features_who_we_are_title' => 'Who We Are',
            'features_who_we_are_text' => 'A robotics & STEM academy for kids aged 5-14, using LEGO Education, Arduino, and coding to make learning fun and engaging.',
            'features_mission_title' => 'Our Mission',
            'features_mission_text' => 'Spark curiosity and build confidence by combining play with technology to create future problem solvers.',
            'features_vision_title' => 'Our Vision',
            'features_vision_text' => 'Inspire young minds to become leaders in innovation and technology, shaping a brighter world.',
            'features_cta_text' => 'DISCOVER MORE',
            'features_feature1_title' => 'Creativity & Innovation',
            'features_feature1_text' => 'Foster creative thinking and innovative problem-solving through hands-on robotics projects.',
            'features_feature2_title' => 'Teamwork & Collaboration',
            'features_feature2_text' => 'Build communication skills and collaborative problem-solving abilities through group projects.',
            'features_feature3_title' => 'Fun & Engaging Learning',
            'features_feature3_text' => 'Make complex STEM concepts accessible and enjoyable through play-based learning.',
            'features_feature4_title' => 'Future-Ready Skills',
            'features_feature4_text' => 'Develop critical thinking and technical skills needed for tomorrow\'s technology-driven world.',

            // Third Section - Advanced Features
            'advanced_features_title_before_highlighted_word' => 'Why Choose Us ?',
            'advanced_features_title_highlighted_word' => 'Us',
            'advanced_features_title_after_highlighted_word' => '?',
            'advanced_features_feature1_title' => 'Experienced Instructors',
            'advanced_features_feature1_text' => 'Learn from certified STEM educators with years of experience in robotics and technology education.',
            'advanced_features_feature2_title' => 'Interactive Learning with International Tools',
            'advanced_features_feature2_text' => 'Hands-on experience with LEGO WeDo & EV3, Arduino, and cutting-edge robotics platforms.',
            'advanced_features_feature3_title' => 'Safe & Encouraging Environment',
            'advanced_features_feature3_text' => 'A nurturing space where kids feel confident to explore, experiment, and make mistakes safely.',
            'advanced_features_feature4_title' => 'Courses Tailored for All Ages',
            'advanced_features_feature4_text' => 'Age-appropriate curriculum designed to challenge and engage kids from 5-14 years old.',
            'advanced_features_additional_info_title' => 'Ready to Start Your Robotics Journey?',
            'advanced_features_additional_subtitle' => 'Join hundreds of young innovators who are already building the future!',
            'advanced_features_additional_cta_button_text' => 'GET STARTED TODAY',

            // Fourth Section - Courses
            'courses_title_before_highlighted_word' => 'Programs &',
            'courses_title_highlighted_word' => 'Courses',
            'courses_title_after_highlighted_word' => '',
            'course_badge_title' => 'Young Bot Minds',
            'course_badge_sub_title' => 'Robotics Academy',
            'course_age_card_1_title' => 'Ages 5–7: LEGO WeDo',
            'course_age_card_1_sub_title' => 'Ages 5–7: LEGO WeDo',
            'course_age_card_1_point_1' => 'Build simple robots with LEGO WeDo kits',
            'course_age_card_1_point_2' => 'Learn basic programming with drag-and-drop blocks',
            'course_age_card_1_point_3' => 'Develop creativity, motor skills, and teamwork',
            'course_age_card_1_outcome' => '👉 Kids build their first robots and learn how coding makes things move!',
            'course_age_card_2_title' => 'Ages 8–11: LEGO EV3 & Scratch',
            'course_age_card_2_sub_title' => 'Intermediate Robotics',
            'course_age_card_2_point_1' => 'Explore advanced LEGO robotics (sensors, motors)',
            'course_age_card_2_point_2' => 'Code using Scratch and LEGO software. Solve challenges like line-following and obstacle-avoidance',
            'course_age_card_2_point_3' => 'Team projects and mini competitions',
            'course_age_card_2_outcome' => '👉 Kids design, program, and test robots that can think and react!',
            'course_age_card_3_title' => 'Ages 12–14+: Arduino & Python',
            'course_age_card_3_sub_title' => 'Advanced Robotics & Coding',
            'course_age_card_3_point_1' => 'Introduction to electronics with Arduino. Learn coding with Python for robotics',
            'course_age_card_3_point_2' => 'Build smart projects (traffic lights, sensors, smart cars)',
            'course_age_card_3_point_3' => 'Explore real-world engineering and problem-solving',
            'course_age_card_3_outcome' => '👉 Teens gain coding and electronics skills for future STEM careers!',

            // Fifth Section - Students
            'students_title_before_highlighted_word' => 'Our Amazing',
            'students_title_highlighted_word' => 'Students',
            'students_title_after_highlighted_word' => '',

            // Sixth Section - Events
            'events_title_before_highlighted_word' => 'Upcoming',
            'events_title_highlighted_word' => 'Events',
            'events_title_after_highlighted_word' => ' & Workshops',
            'events_subtitle' => 'Join our exciting workshops and events designed to inspire creativity and learning in robotics and coding.',

            // Seventh Section - About Us
            'about_us_heading' => 'About Us',
            'about_us_title' => 'Programming the Future Today',
            'about_us_text' => 'Young Minds is dedicated to inspiring the next generation of innovators through interactive robotics and programming education. We believe every child has the potential to become a creator of technology.',
            'about_us_point_1' => 'Arduino programming and robotics fundamentals for beginners to advanced learners',
            'about_us_point_2' => 'Structured learning paths that build computational thinking and problem-solving skills',
            'about_us_cta_button_text' => 'Join Us',

            // Eighth Section - Stats
            'stats_heading' => 'Our Impact',
            'stats_title' => 'Amazing Numbers',
            'stats_text' => 'Join our growing community of young tech innovators building the future!',
            'stats_stat1_number' => '7',
            'stats_stat1_title' => 'Expert Teachers',
            'stats_stat1_text' => 'Certified robotics & programming instructors',
            'stats_stat2_number' => '6',
            'stats_stat2_title' => 'Tech Courses',
            'stats_stat2_text' => 'Arduino, robotics & programming courses',
            'stats_stat3_number' => '10',
            'stats_stat3_title' => 'Active Students',
            'stats_stat3_text' => 'Young minds learning and creating',
            'stats_additional_info_title' => 'Ready to Join Our Community?',
            'stats_additional_info_subtitle' => 'Start your journey in robotics and programming today!',
            'stats_additional_info_cta_button_text' => 'Get Started Now',

            // Ninth Section - Advanced
            'advanced_heading' => 'Advanced Technology',
            'advanced_title' => 'Interactive Learning Platform',
            'advanced_text' => 'Our cutting-edge learning platform combines virtual simulations with real hardware, allowing students to program Arduino boards, build robots, and test their creations in both digital and physical environments.',
            'advanced_point_1_title' => 'Code Anywhere',
            'advanced_point_1_description' => 'Access our Arduino IDE and robot simulators from anywhere with cloud-based programming tools',
            'advanced_point_2_title' => 'Robotics Mentors',
            'advanced_point_2_description' => 'Learn from certified robotics engineers and experienced programming instructors',

            // Tenth Section - Footer
            'footer_title' => 'About Technology',
            'footer_text' => 'Empowering the next generation with hands-on experience in robotics, coding, and innovative technology. Join our community to explore the future of tech, from Arduino to artificial intelligence, and unlock endless possibilities!',

            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
