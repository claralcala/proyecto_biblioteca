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
        Schema::table('prestamos_revistas', function (Blueprint $table) {
            
               
    
                $table->foreignId('user_id')->constrained()->onDelete('cascade');
                $table->foreignId('revista_id')->constrained()->onDelete('cascade');
                $table->timestamp('fecha_prestamo')->useCurrent();
                $table->timestamp('fecha_devolucion')->nullable();
                
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('prestamos_revistas', function (Blueprint $table) {
            
        });
    }
};
