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
        Schema::create('restaurant_informations', function (Blueprint $table) {
            $table->increments("id");
            $table->string("email");
            $table->string("phone");
            $table->unsignedInteger("location_id");
            $table->foreign("location_id")->references("id")->on("locations");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurant_information');
    }
};
