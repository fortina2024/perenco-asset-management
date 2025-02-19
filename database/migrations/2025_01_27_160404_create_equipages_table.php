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
        Schema::create('equipages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('voyage_id');
            $table->string('rank');
            $table->string('nom')->nullable();
            $table->string('postnom')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipages');
    }
};
