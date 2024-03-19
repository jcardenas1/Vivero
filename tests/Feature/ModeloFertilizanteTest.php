<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Fertilizante;

class ModeloFertilizanteTest extends TestCase
{
    public function test_campos_obligatorios(): void
    {
        $this->expectException('Illuminate\Database\QueryException');
        Fertilizante::create([]);
    }

    public function test_crear_fertilizante_sin_asociar_producto_control(): void
    {
        $this->expectException('Illuminate\Database\QueryException');
        Fertilizante::create(['fecha_aplicacion' => '15/03/2024']);

    }
}
