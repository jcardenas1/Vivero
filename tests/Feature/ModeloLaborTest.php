<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Labor;

class ModeloLaborTest extends TestCase
{
    public function test_campos_obligatorios(): void
    {
        $this->expectException('Illuminate\Database\QueryException');
        Labor::create([]);
    }

    public function test_crear_labor_sin_asociar_vivero(): void
    {
        $this->expectException('Illuminate\Database\QueryException');
        Labor::create([
            'fecha_realizacion' => '12/03/24', 
            'descripcion' => 'Regar el cultivo de Maíz']);

    }
}
