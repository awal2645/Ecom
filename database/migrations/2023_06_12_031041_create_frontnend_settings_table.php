<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('frontnend_settings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('tel');
            $table->string('address');
            $table->string('logo');
            $table->string('banner');
            $table->string('openig_time');
            $table->string('camping_headline');
            $table->timestamps();
        });
        DB::table('frontnend_settings')->insert([
            'name' => 'Ogani',
            'email' => 'hello@awal.com',
            'tel' => '+65 11.188.888',
            'address' => '60-49 Road 11378 New York',
            'openig_time' => '60-49 Road 11378 New York',
            'camping_headline' => 'Free Shipping for all Order of $99',
            'logo' => '/storage/images/logo.png',
            'banner' => '/storage/images/banner.jpg',
            // add more columns and values as needed
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('frontnend_settings');
    }
};
