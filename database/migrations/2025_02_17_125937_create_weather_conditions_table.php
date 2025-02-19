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
        Schema::create('weather_conditions', function (Blueprint $table) {
            $table->id();
            $table->string('weather')->nullable();
            $table->string('sea_state')->nullable();
            $table->float('wind_dir')->nullable();
            $table->float('wind_force')->nullable();
            $table->float('current_dir')->nullable();
            $table->float('current_speed')->nullable();
            $table->string('visibility')->nullable();
            $table->foreignId('voyage_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weather_conditions');
    }
};
