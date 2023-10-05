<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories', 'id')->cascadeOnDelete();
            $table->string('title')->nullable()->default(null);
            $table->text('sub_title')->nullable()->default(null);
            $table->string('slug')->nullable()->default(null);
            $table->decimal('price', 10, 2)->nullable();
            $table->string('thumbnail')->nullable()->default(null);
            $table->string('download_link')->nullable()->default(null);
            $table->longText('description')->nullable()->default(null);
            $table->boolean('popular')->default(true);
            $table->boolean('status')->default(true);
            $table->text('meta_title')->nullable()->default(null);
            $table->text('meta_keyword')->nullable()->default(null);
            $table->text('meta_description')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
