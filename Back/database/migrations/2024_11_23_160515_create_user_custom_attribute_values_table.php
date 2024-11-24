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
        Schema::create('user_custom_attribute_values', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_custom_attribute_id');
            $table->string('value', 200);
            $table->foreign('user_custom_attribute_id')->references('id')->on('user_custom_attributes')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_custom_attribute_values');
    }
};
