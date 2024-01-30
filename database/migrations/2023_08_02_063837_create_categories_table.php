<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->integer('parent_id')->nullable()->default(0);
            $table->string('name')->nullable()->default(null);
            $table->string('slug');
            $table->string('image_thumb')->nullable()->default(null);
            $table->string('image')->nullable()->default(null);
            $table->longText('content')->nullable()->default(null);
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
        Schema::dropIfExists('categories');
    }
};
