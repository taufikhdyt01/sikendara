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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['passenger', 'freight']);
            $table->string('number_plate');
            $table->string('brand');
            $table->string('model');
            $table->integer('year');
            $table->integer('capacity');
            $table->enum('owned_by', ['company', 'rental']);
            $table->enum('status', ['available', 'in use', 'maintenance']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
