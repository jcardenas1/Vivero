<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Productor;

class ModeloProductorTest extends TestCase
{
    public function test_campos_obligatorios(): void
    {
        $this->expectException("Illuminate\Database\QueryException");
        Productor::create([]);
    }

    public function test_no_duplicidad(): void
    {
        Productor::create([
            'documento' => '1326548',
            'nombre' => 'Mario',
            'apellido' => 'Castaño',
            'telefono' => '3145693200',
            'correo' => 'marioc@gmail.com'
        ]);

        $this->assertNotEmpty(Productor::where('documento', '1326548'));

        $this->expectException("Illuminate\Database\QueryException");
        Productor::create([
            'documento' => '1326548',
            'nombre' => 'Mario',
            'apellido' => 'Castaño',
            'telefono' => '3145693200',
            'correo' => 'marioc@gmail.com'
        ]);        
    }


}
