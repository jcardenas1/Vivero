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
        Schema::enableForeignKeyConstraints();

        Schema::create('fertilizantes', function (Blueprint $table) {
            $table->id();
            $table->string('fecha_aplicacion')->nullable(false);
            $table->unsignedBigInteger('producto_control_id');
            $table->timestamps();
            $table->foreign('producto_control_id')->references('id')->on('productos_control');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fertilizantes');
    }
};
