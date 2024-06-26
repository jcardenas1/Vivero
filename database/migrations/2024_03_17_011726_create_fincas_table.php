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

        Schema::create('fincas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable(false)->unique();
            $table->string('numero_catastro')->nullable(false)->unique();
            $table->string('municipio')->nullable(false);
            $table->unsignedBigInteger('productor_id');
            $table->timestamps();
            $table->foreign('productor_id')->references('id')->on('productores');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fincas');
    }
};
