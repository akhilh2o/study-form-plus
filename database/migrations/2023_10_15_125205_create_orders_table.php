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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->default(null)->constrained('users', 'id')->cascadeOnDelete();
            $table->string('name')->nullable()->default(null);
            $table->string('mobile')->nullable()->default(null);
            $table->string('email')->nullable()->default(null);
            $table->text('address')->nullable()->default(null);
            $table->string('landmark')->nullable()->default(null);
            $table->string('city')->nullable()->default(null);
            $table->string('state')->nullable()->default(null);
            $table->string('pincode')->nullable()->default(null);
            $table->string('country')->nullable()->default(null);
            $table->decimal('sub_total', 10, 2)->nullable();
            $table->decimal('total', 10, 2)->nullable();
            $table->decimal('coupon_discount_amount', 10, 2)->nullable()->default(null);
            $table->string('coupon_discount_remark')->nullable()->default(null);
            $table->string('coupon_code')->nullable()->default(null);
            $table->string('status')->nullable()
                ->default('pending')
                ->comment('pending,confirmed,delivered');
            $table->boolean('payment_status')->default(false)->comment('false,true');
            $table->string('transaction_id')->nullable()->default(null);
            $table->string('payment_id')->nullable()->default(null);
            $table->string('payment_type')->nullable()->default(null);
            $table->json('payment_detail')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
