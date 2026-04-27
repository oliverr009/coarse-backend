<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('brand')->nullable();
            $table->string('category');
            $table->string('sku')->nullable()->index();
            $table->string('processor')->nullable();
            $table->string('ram')->nullable();
            $table->string('storage')->nullable();
            $table->string('screen_size')->nullable();
            $table->string('ports')->nullable();
            $table->string('operating_system')->nullable();
            $table->string('condition')->nullable();
            $table->decimal('retail_price', 12, 2)->default(0);
            $table->decimal('wholesale_price', 12, 2)->nullable();
            $table->integer('stock')->default(0);
            $table->integer('low_stock_threshold')->default(3);
            $table->string('image_path')->nullable();
            $table->string('datasheet_path')->nullable();
            $table->string('manual_path')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->index(['category','brand']);
        });
    }

    public function down(): void {
        Schema::dropIfExists('products');
    }
};
