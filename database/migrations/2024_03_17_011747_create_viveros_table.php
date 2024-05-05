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

        Schema::create('viveros', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable(false)->unique();
            $table->string('codigo')->nullable(false)->unique();
            $table->string('tipo_cultivo')->nullable(false);
            $table->unsignedBigInteger('finca_id');
            $table->unsignedBigInteger('productor_id');
            $table->timestamps();
            $table->foreign('finca_id')->references('id')->on('fincas');
            $table->foreign('productor_id')->references('id')->on('productores');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('viveros');
    }
};
