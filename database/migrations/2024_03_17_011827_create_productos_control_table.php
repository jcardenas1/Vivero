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
        Schema::create('productos_control', function (Blueprint $table) {
            $table->id();
            $table->string('registro_ica')->nullable(false)->unique();
            $table->string('nombre_producto')->nullable(false);
            $table->string('frecuencia_aplicacion')->nullable(false);
            $table->string('valor_producto')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos_control');
    }
};
