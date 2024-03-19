<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\ProductoControl;
use App\Models\Productor;
use App\Models\Finca;
use App\Models\Vivero;
use App\Models\Labor;

class ModeloProductoControlTest extends TestCase
{
    public function test_campos_obligatorios(): void
    {
        $this->expectException('Illuminate\Database\QueryException');
        ProductoControl::create([]);
    }

    public function test_no_duplicidad(): void
    {
        $productor = new Productor();
        $productor::create([
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

        $labor = new Labor();
        $labor::create([
            'fecha_realizacion' => '123564', 
            'descripcion' => 'Manizales', 
            'vivero_id' => $vivero::latest()->first()->id
        ]);

        ProductoControl::create([
            'registro_ica' => '45678922',
            'nombre_producto' => 'Fumigante',
            'frecuencia_aplicacion' => '2 veces por semana',
            'valor_producto' => '100',
        ]);

        $this->assertNotEmpty(Finca::where('registro_ica', '45678922'));

        $this->expectException('Illuminate\Database\QueryException');
        ProductoControl::create([
            'registro_ica' => '45678922',
            'nombre_producto' => 'Fumigante',
            'frecuencia_aplicacion' => '2 veces por mes',
            'valor_producto' => '100',
        ]);
    }
}
