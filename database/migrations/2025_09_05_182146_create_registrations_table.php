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
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->string('child_name');
            $table->integer('child_age');
            $table->string('parent_phone');
            $table->foreignId('course_id')->constrained()->onDelete('cascade');
            $table->integer('selected_level')->nullable();
            $table->enum('status', ['pending', 'accepted', 'cancelled'])->default('pending');
            $table->enum('preferred_time_slot', ['morning', 'afternoon', 'evening', 'weekend'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
