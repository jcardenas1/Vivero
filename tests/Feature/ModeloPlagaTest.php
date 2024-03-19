<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Plaga;

class ModeloPlagaTest extends TestCase
{
    public function test_campos_obligatorios(): void
    {
        $this->expectException('Illuminate\Database\QueryException');
        Plaga::create([]);
    }

    public function test_crear_plaga_sin_asociar_producto_control(): void
    {
        $this->expectException('Illuminate\Database\QueryException');
        Plaga::create(['periodo_carencia' => '12/03/2024']);

    }
}
