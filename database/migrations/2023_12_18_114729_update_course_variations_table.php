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
        Schema::dropIfExists('course_variations');
        Schema::create('course_variations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained('courses', 'id')->cascadeOnDelete();
            $table->string('exam_attempt')->nullable();
            $table->decimal('net_price_download', 10, 2)->nullable();
            $table->decimal('net_price_pendrive', 10, 2)->nullable();
            $table->decimal('sale_price_download', 10, 2)->nullable();
            $table->decimal('sale_price_pendrive', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_variations');
    }
};
