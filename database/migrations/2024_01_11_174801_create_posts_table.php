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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained("users");
            $table->foreignId("category_id")->constrained("categories");
            $table->string("title", 220);
            $table->string("slug", 255);
            $table->string("image", 255);
            $table->string("excerp", 255);
            $table->text("body");
            $table->string("keywords", 255);
            $table->integer("view", false)->length(100);
            $table->integer("like", false)->length(100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
