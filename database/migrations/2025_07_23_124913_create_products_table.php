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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('wp_id')->nullable();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('sku')->nullable();
            $table->string('type')->default('simple');
            $table->text('description')->nullable();
            $table->text('short_description')->nullable();
            $table->decimal('price', 10, 2)->default(0);
            $table->decimal('regular_price', 10, 2)->nullable();
            $table->decimal('sale_price', 10, 2)->nullable();
            $table->boolean('on_sale')->default(false);
            $table->boolean('purchasable')->default(true);
            $table->boolean('featured')->default(false);
            $table->enum('status', ['publish', 'draft'])->default('publish');
            $table->string('stock_status')->default('instock');
            $table->string('weight')->nullable();
            $table->json('dimensions')->nullable(); // length, width, height
            $table->string('brand')->nullable();
            $table->string('preorder_text')->nullable();
            $table->string('product_code')->nullable();
            $table->boolean('free_delivery')->default(false);
            $table->string('image')->nullable(); // Main image
            $table->json('gallery')->nullable(); // Array of images
            $table->json('categories')->nullable(); // Array of categories
            $table->integer('total_sales')->default(0);
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
