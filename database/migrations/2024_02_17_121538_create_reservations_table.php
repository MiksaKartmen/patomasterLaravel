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
        Schema::create('reservations', function (Blueprint $table) {
            $table->increments("id");
            $table->string("name");
            $table->string("surname");
            $table->string("email");
            $table->string("phone");
            $table->date("date");
            $table->time("time");
            $table->integer("people");
            $table->text("special_request")->nullable();
            $table->unsignedInteger("table_id");
            $table->foreign("table_id")->references("id")->on("tables");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservation');
    }
};
