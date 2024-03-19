<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Finca;
use App\Models\Productor;

class ModeloFincaTest extends TestCase
{
    public function test_campos_obligatorios(): void
    {
        $this->expectException('Illuminate\Database\QueryException');
        Finca::create([]);
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

        Finca::create([
            'numero_catastro' => '123564', 
            'municipio' => 'Manizales', 
            'productor_id' => $productor::latest()->first()->id]);

        $this->assertNotEmpty(Finca::where('numero_catastro', '123564'));

        $this->expectException('Illuminate\Database\QueryException');
        Finca::create([
            'numero_catastro' => '123564', 
            'municipio' => 'Manizales', 
            'productor_id' => $productor::latest()->first()->id]
        );

    }

    public function test_crear_finca_sin_asociar_productor(): void
    {
        $this->expectException('Illuminate\Database\QueryException');
        Finca::create(['numero_catastro' => '4569871', 'municipio' => 'Pereira']);

    }
}
