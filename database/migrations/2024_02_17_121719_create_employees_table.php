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
        Schema::create('employees', function (Blueprint $table) {
            $table->increments("id");
            $table->string("name");
            $table->string("surname");
            $table->text("biography")->nullable();
            $table->string("image")->nullable();
            $table->unsignedInteger("employee_role_id");
            $table->foreign("employee_role_id")->references("id")->on("employee_roles");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee');
    }
};
