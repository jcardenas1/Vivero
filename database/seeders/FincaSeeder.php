<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class FincaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i=1; $i < 11; $i++) {
            DB::table("fincas")->insert(
                [
                    'id' => $i,
                    'nombre' => $faker->firstName("male"),
                    'numero_catastro' => $faker->unique()->randomNumber(9),
                    'municipio' => $faker->firstName("male"),
                    'productor_id' => $i,
                    'created_at' => date('Y-m-d H:m:s'),
                    'updated_at' => date('Y-m-d H:m:s')
                ]
            );
        }
    }
}
