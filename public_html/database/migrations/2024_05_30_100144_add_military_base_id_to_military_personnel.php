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
        Schema::table('military_personnel', function (Blueprint $table) {
            $table->foreignId('military_base_id')->default('1')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('military_personnel', function (Blueprint $table) {
            $table->dropConstrainedForeignId('military_base_id');
        });
    }
};
