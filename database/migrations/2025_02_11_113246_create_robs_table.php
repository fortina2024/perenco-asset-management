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
        Schema::create('robs', function (Blueprint $table) {
            $table->id();
            $table->string('product');
            $table->float('jourj-1')->nullable();
            $table->float('received')->nullable();
            $table->float('delivered')->nullable();
            $table->float('produced')->nullable();
            $table->float('consumption')->nullable();
            $table->float('correction')->nullable();
            $table->float('jourj')->nullable();
            $table->foreignId('voyage_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('robs');
    }
};
