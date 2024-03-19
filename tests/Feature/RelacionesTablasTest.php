<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Productor;
use App\Models\Finca;
use App\Models\Vivero;
use App\Models\Labor;
use App\Models\ProductoControl;
use App\Models\Fertilizante;
use App\Models\Hongo;

class RelacionesTablasTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_relaciones_tablas(): void
    {
        $productor = new Productor();
        $productor::create([
            'documento' => '1326548',
            'nombre' => 'Mario',
            'apellido' => 'Castaño',
            'telefono' => '3145693200',
            'correo' => 'marioc@gmail.com'
        ]);

        $this->assertNotEmpty(Productor::where('documento', '1326548'));

        $finca = new Finca();
        $finca::create([
            'numero_catastro' => '4658971',
            'municipio' => 'Filadelfia',
            'productor_id' => $productor::latest()->first()->id
        ]);

        $this->assertNotEmpty(Finca::where('numero_catastro', '4658971'));
        $this->assertNotEmpty($finca->productor());

        $vivero = new Vivero();
        $vivero::create([
            'codigo' => '1326548',
            'tipo_cultivo' => 'Arroz',
            'finca_id' => $finca::latest()->first()->id
        ]);

        $this->assertNotEmpty(Vivero::where('codigo', '1326548'));
        $this->assertNotEmpty($vivero->finca());

        $fumigar = new Labor();
        $fumigar::create([
            'fecha_realizacion' => '15/03/2024',
            'descripcion' => 'Fumigar el cultivo de arroz',
            'vivero_id' => $vivero::latest()->first()->id
        ]);

        $this->assertNotEmpty($fumigar->vivero());

        $fertilizar = new Labor();
        $fertilizar::create([
            'fecha_realizacion' => '15/03/2024',
            'descripcion' => 'Fertilizar y eliminar hongos del cultivo de Arroz',
            'vivero_id' => $vivero::latest()->first()->id
        ]);

        $this->assertNotEmpty($fertilizar->vivero());

        $artal = new ProductoControl();
        $artal::create([
            'registro_ica' => '1235600',
            'nombre_producto' => 'ARTAL Arroz',
            'frecuencia_aplicacion' => '2 veces al mes',
            'valor_producto' => '50',
        ]);
        $artal->labor()->attach(
            $artal::latest()->first()->id, 
            [
                'labor_id' => $fertilizar::latest()->first()->id,
                'producto_control_id' => $fertilizar::latest()->first()->id
            ]
        );

        $this->assertNotEmpty(ProductoControl::where('registro_ica', '1235600'));
        $this->assertNotEmpty($artal->labor());
        $this->assertNotEmpty($fertilizar->productoscontrol());

        $bezil = new ProductoControl();
        $bezil::create([
            'registro_ica' => '85213457',
            'nombre_producto' => 'Bezil 50WP',
            'frecuencia_aplicacion' => '1 vez al mes',
            'valor_producto' => '100',
        ]);

        $bezil->labor()->attach(
            $bezil::latest()->first()->id, 
            [
                'labor_id' => $fumigar::latest()->first()->id, 
                'producto_control_id' => $bezil::latest()->first()->id
            ]
        );
        $bezil->labor()->attach(
            $bezil::latest()->first()->id, 
            [
                'labor_id' => $fertilizar::latest()->first()->id, 
                'producto_control_id' => $bezil::latest()->first()->id
            ]
        );

        $this->assertNotEmpty(ProductoControl::where('registro_ica', '85213457'));
        $this->assertNotEmpty($bezil->labor());
        $this->assertNotEmpty($fertilizar->productoscontrol());

        $fusarium = new Hongo();
        $fusarium::create([
            'nombre_hongo' => 'Fusarium',
            'periodo_carencia' => '21 días',
            'producto_control_id' => $bezil::latest()->first()->id
        ]);

        $this->assertNotEmpty($fusarium->productoControl());

        $micronutrientes = new Fertilizante();
        $micronutrientes::create([
            'fecha_aplicacion' => '15/03/2024',
            'producto_control_id' => $artal::latest()->first()->id
        ]);

        $this->assertNotEmpty($micronutrientes->productoControl());
    }
}
