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
        Schema::create('voyages', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->foreignId('boat_id');
            $table->foreignId('location')->references('id')->on('champofboats')->nullable();
            $table->foreignId('destination')->references('id')->on('champofboats')->nullable();
            $table->string('eta')->nullable();
            $table->string('fifi')->nullable();
            $table->string('ais')->nullable();
            $table->string('band_landing')->nullable();
            $table->float('miles')->nullable();
            $table->integer('passagers')->nullable();
            $table->foreignId('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voyages');
    }
};
