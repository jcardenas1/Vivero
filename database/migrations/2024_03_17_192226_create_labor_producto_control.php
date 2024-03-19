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

        Schema::create('labor_producto_control', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('producto_control_id');
            $table->unsignedBigInteger('labor_id');
            $table->timestamps();
            $table->foreign('producto_control_id')->references('id')->on('productos_control');
            $table->foreign('labor_id')->references('id')->on('labores');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('labor_producto_control');
    }
};
