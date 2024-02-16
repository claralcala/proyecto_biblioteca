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
        Schema::table('revistas', function (Blueprint $table) {
            $table->boolean('prestado')->default(false); // Añadimos el campo prestado
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('revistas', function (Blueprint $table) {
            $table->dropColumn('prestado'); // Quita el campo prestado
        });
    }
};
