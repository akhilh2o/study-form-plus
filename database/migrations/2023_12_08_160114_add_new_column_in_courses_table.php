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
                $table->text('faculties')->nullable()->default(null)->comment('teacher (faculties) for this course');
                $table->text('doubt_solving_faculties')->nullable()->default(null)->comment('teacher for the doubt solving for this course');
                $table->string('language')->nullable()->default(null)->comment('language should be english or hindi');
                $table->string('duration')->nullable()->default(null)->comment('duration should be text like(1 hours)');
                $table->string('exam_validity')->nullable()->default(null)->comment('exam validity should be text like (Dec-2023)');
                $table->boolean('order_type_pendrive')->default(false)->comment('order type should be allowed (pendrive)');
                $table->boolean('order_type_download')->default(false)->comment('order type should be allowed (download)');
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropColumn('faculties');
            $table->dropColumn('doubt_solving_faculties');
            $table->dropColumn('language');
            $table->dropColumn('duration');
            $table->dropColumn('exam_validity');
            $table->dropColumn('order_type_pendrive');
            $table->dropColumn('order_type_download');
        });
    }
};
