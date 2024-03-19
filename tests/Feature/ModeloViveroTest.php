<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Vivero;
use App\Models\Productor;
use App\Models\Finca;

class ModeloViveroTest extends TestCase
{
    public function test_campos_obligatorios(): void
    {
        $this->expectException('Illuminate\Database\QueryException');
        Vivero::create([]);
    }

    public function test_no_duplicidad(): void
    {
        $productor = Productor::create([
            'documento' => '1326548',
            'nombre' => 'Mario',
            'apellido' => 'Castaño',
            'telefono' => '3145693200',
            'correo' => 'marioc@gmail.com'
        ]);

        $finca = new Finca();
        $finca::create([
            'numero_catastro' => '4658971',
            'municipio' => 'Filadelfia',
            'productor_id' => $productor::latest()->first()->id
        ]);

        $vivero = new Vivero();
        $vivero::create([
            'codigo' => '1326548',
            'tipo_cultivo' => 'Maíz',
            'finca_id' => $finca::latest()->first()->id
        ]);

        $this->assertNotEmpty(Vivero::where('codigo', '1326548'));

        $this->expectException('Illuminate\Database\QueryException');
        Vivero::create([
            'codigo' => '1326548',
            'tipo_cultivo' => 'Maíz',
            'finca_id' => $finca::latest()->first()->id
        ]);

    }

    public function test_crear_finca_sin_asociar_productor(): void
    {
        $this->expectException('Illuminate\Database\QueryException');
        Vivero::create([
            'codigo' => '65498211',
            'tipo_cultivo' => 'Arroz',
            'finca_id' => null
        ]);

    }
}
