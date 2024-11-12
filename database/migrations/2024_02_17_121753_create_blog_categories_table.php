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
        Schema::create('blog_categories', function (Blueprint $table) {
            $table->increments("id");
            $table->unsignedInteger("blog_id");
            $table->unsignedInteger("category_blog_id");
            $table->foreign("blog_id")->references("id")->on("blogs");
            $table->foreign("category_blog_id")->references("id")->on("category_blogs");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_category');
    }
};
