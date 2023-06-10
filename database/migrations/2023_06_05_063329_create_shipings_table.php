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
        Schema::create('shipings', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('order_id');
            $table->string('pay_ammount')->nullable();
            $table->string('payment_status')->default('Pending');
            $table->string('shiping_status')->default('Pending');
            $table->string('account_number')->nullable();
            $table->integer('discount_amount')->default(0);
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->integer('phone')->nullable();
            $table->string('country')->nullable();
            $table->string('postcode')->nullable();
            $table->text('address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipings');
    }
};
