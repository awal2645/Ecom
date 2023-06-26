<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('details')->default('No description');
            $table->string('availability')->nullable();
            $table->string('shipping_time')->nullable();
            $table->string('weight')->nullable();
            $table->string('thumbnail_image');
            $table->string('images')->nullable();
            $table->string('slug')->unique();
            $table->string('disscount')->nullable();
            $table->integer('price');
            $table->integer('category_id');
            $table
                ->string('featured_product')
                ->nullable()
                ->default('isUnChecked');
            $table->integer('status');
            $table->integer('unit')->nullable();
            $table->integer('brand_id')->nullable();
            $table->text('description')->default('No description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
