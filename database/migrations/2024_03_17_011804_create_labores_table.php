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

        Schema::create('labores', function (Blueprint $table) {
            $table->id();
            $table->string('fecha_realizacion')->nullable(false);
            $table->string('descripcion')->nullable(false);
            $table->unsignedBigInteger('vivero_id');
            $table->timestamps();
            $table->foreign('vivero_id')->references('id')->on('viveros');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('labores');
    }
};
