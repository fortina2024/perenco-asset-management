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
        Schema::create('hses', function (Blueprint $table) {
            $table->id();
            $table->float('injury')->nullable();
            $table->float('sea_state')->nullable();
            $table->float('pollution')->nullable();
            $table->float('damage')->nullable();
            $table->float('near_miss')->nullable();
            $table->float('illness')->nullable();
            $table->float('permit_to_work')->nullable();
            $table->float('drill')->nullable();
            $table->float('safety_meeting')->nullable();
            $table->foreignId('voyage_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hses');
    }
};
