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
        Schema::table('c_m_s', function (Blueprint $table) {
            $table->string('hero_image')->nullable()->after('hero_cta_button_text');
            $table->string('about_image')->nullable()->after('about_us_cta_button_text');
            $table->string('advanced_section_image')->nullable()->after('advanced_point_2_description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('c_m_s', function (Blueprint $table) {
            $table->dropColumn(['hero_image', 'about_image', 'advanced_section_image']);
        });
    }
};