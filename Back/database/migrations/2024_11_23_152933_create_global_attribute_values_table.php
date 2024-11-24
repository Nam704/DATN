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
        Schema::create('global_attribute_values', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('global_attribute_id');
            $table->string('reference_table', 50);
            $table->unsignedBigInteger('reference_id');
            $table->foreign('global_attribute_id')->references('id')->on('global_attributes')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('global_attribute_values');
    }
};
