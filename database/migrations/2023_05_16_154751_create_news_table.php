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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("slug");
            $table->text("description");
            $table->longText("body")->nullable();
            $table->longText("body_2")->nullable();
            $table->unsignedBigInteger("type_id");
            $table->integer("pin");
            $table->string("thumbnail");
            $table->integer("draft")->default(0);
            $table->integer("status")->default(1);
            $table->integer("view")->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
