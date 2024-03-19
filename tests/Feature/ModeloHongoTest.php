<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Hongo;

class ModeloHongoTest extends TestCase
{
    public function test_campos_obligatorios(): void
    {
        $this->expectException('Illuminate\Database\QueryException');
        Hongo::create([]);
    }

    public function test_crear_hongo_sin_asociar_producto_control(): void
    {
        $this->expectException('Illuminate\Database\QueryException');
        Hongo::create([
            'nombre_hongo' => 'Fusarium', 
            'periodo_carencia' => '12/03/2024'
        ]);

    }
}
