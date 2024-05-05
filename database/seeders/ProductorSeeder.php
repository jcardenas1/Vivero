<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ProductorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i=1; $i < 11; $i++) {
            DB::table("productores")->insert(
                [
                    'id' => $i,
                    'documento' => $faker->unique()->randomNumber(9),
                    'nombre' => $faker->firstName("male"),
                    'apellido' => $faker->lastName(),
                    'telefono' => $faker->phoneNumber(),
                    'correo' => $faker->unique()->safeEmail(),
                    'created_at' => date('Y-m-d H:m:s'),
                    'updated_at' => date('Y-m-d H:m:s')
                ]
            );
        }
    }
}
