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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
             $table->unsignedBigInteger('wp_id')->nullable();
           $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();

            $table->unsignedBigInteger('parent_id')->nullable();
            $table->integer('menu_order')->default(0);

            // Optional image fields (can also be moved to a separate table if needed)
            $table->string('image_url')->nullable();
            $table->string('image_alt')->nullable();

            $table->timestamps();

            $table->foreign('parent_id')->references('id')->on('categories')->onDelete('set null');
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
