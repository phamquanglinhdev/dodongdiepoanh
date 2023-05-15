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
            $table->string("name");
            $table->unsignedBigInteger("category_id");
            $table->string("code");
            $table->string("size");
            $table->string("material");
            $table->integer("status");
            $table->foreign("category_id")->references("id")->on("categories");
            $table->string("thumbnail_1");
            $table->string("thumbnail_2")->nullable();
            $table->string("thumbnail_3")->nullable();
            $table->string("thumbnail_4")->nullable();
            $table->string("thumbnail_5")->nullable();
            $table->string("description")->nullable();
            $table->integer("view")->default(0);
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
