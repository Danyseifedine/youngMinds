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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('course_id')->constrained('courses')->onDelete('cascade');
            $table->integer('level')->nullable();
            $table->decimal('amount_paid', 10, 2);
            $table->enum('payment_status', ['partial', 'full', 'overpaid', 'refunded'])->default('partial');
            $table->decimal('owe_to_student', 10, 2)->default(0);
            $table->decimal('owe_from_student', 10, 2)->default(0);
            $table->date('payment_date');
            $table->date('full_payment_date')->nullable();
            $table->date('refund_date')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
