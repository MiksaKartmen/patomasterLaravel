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
        Schema::create('menu_item_meal_times', function (Blueprint $table) {
            $table->increments("id");
            $table->unsignedInteger("meal_time_id");
            $table->unsignedInteger("menu_item_id");
            $table->foreign("meal_time_id")->references("id")->on("meal_times");
            $table->foreign("menu_item_id")->references("id")->on("menu_items");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_item_meal_time');
    }
};
