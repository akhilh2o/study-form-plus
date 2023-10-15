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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders', 'id')
                ->cascadeOnDelete();
            $table->foreignId('course_id')->nullable()->default()
                ->constrained('courses', 'id')
                ->cascadeOnDelete();
            $table->string('title')->nullable()->default(null);
            $table->text('sub_title')->nullable()->default(null);
            $table->string('slug')->nullable()->default(null);
            $table->decimal('price', 10, 2)->nullable();
            $table->string('thumbnail')->nullable()->default(null);
            $table->string('demo_link')->nullable()->default(null);
            $table->longText('description')->nullable()->default(null);
            $table->string('order_type')->nullable()
                ->default('download')
                ->comment('download,pendrive');
            $table->string('download_link')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
