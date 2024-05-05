<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ViveroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i=1; $i < 11; $i++) {
            DB::table("viveros")->insert(
                [
                    'id' =>  $faker->unique()->randomNumber,
                    'nombre' => $faker->unique()->firstName(),
                    'codigo' => $faker->unique()->randomNumber(9),
                    'tipo_cultivo' => "Café",
                    'finca_id' => $i,
                    'productor_id' => $i,
                    'created_at' => date('Y-m-d H:m:s'),
                    'updated_at' => date('Y-m-d H:m:s')
                ]
            );

            DB::table("viveros")->insert(
                [
                    'id' =>  $faker->unique()->randomNumber,
                    'nombre' => $faker->unique()->firstName(),
                    'codigo' => $faker->unique()->randomNumber(9),
                    'tipo_cultivo' => "Maíz",
                    'finca_id' => $i,
                    'productor_id' => $i,
                    'created_at' => date('Y-m-d H:m:s'),
                    'updated_at' => date('Y-m-d H:m:s')
                ]
            );
        }
    }
}
