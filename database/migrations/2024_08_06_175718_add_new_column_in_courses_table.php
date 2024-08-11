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
        Schema::table('courses', function (Blueprint $table) {
            $table->after('demo_link', function ($table) {
                $table->string('demo_link2')->nullable()->default(null);
            });
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->after('status', function ($table) {
                $table->boolean('is_popular')->nullable()->default(false);
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropColumn('demo_link2');
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('is_popular');
        });
    }
};
