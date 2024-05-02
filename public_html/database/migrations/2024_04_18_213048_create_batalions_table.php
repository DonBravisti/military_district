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
        Schema::create('batalions', function (Blueprint $table) {
            $table->id();
            $table->string('title', 256);
            $table->foreignId('military_base_id')->constrained();
            $table->unsignedBigInteger('commander_id');
            $table->timestamps();

            $table->foreign('commander_id')->references('id')->on('military_personnel');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('batalions');
    }
};
