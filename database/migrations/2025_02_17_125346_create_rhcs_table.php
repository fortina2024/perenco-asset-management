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
        Schema::create('rhcs', function (Blueprint $table) {
            $table->id();;
            $table->string('machinery');
            $table->string('disponibility')->nullable();
            $table->float('jourj_1');
            $table->float('jourj');
            $table->float('rh');
            $table->float('stby');
            $table->float('am')->nullable();
            $table->float('pm')->nullable();
            $table->foreignId('voyage_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rhcs');
    }
};
