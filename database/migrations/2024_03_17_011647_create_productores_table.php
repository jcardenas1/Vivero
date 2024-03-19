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
        Schema::create('productores', function (Blueprint $table) {
            $table->id();
            $table->string('documento')->nullable(false)->unique();
            $table->string('nombre')->nullable(false);
            $table->string('apellido')->nullable(false);
            $table->string('telefono')->nullable(false);
            $table->string('correo')->unique()->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productores');
    }
};
