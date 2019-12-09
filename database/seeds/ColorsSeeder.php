<?php

use Illuminate\Database\Seeder;

class ColorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('colors')->insert([
        [
          "name" => "Blanco",
        ],
        [
          "name" => "Negro",
        ],
        [
          "name" => "Rojo",
        ],
        [
          "name" => "Azul",
        ],
        [
          "name" => "Amarillo",
        ],
        [
          "name" => "Naranja",
        ],
        [
          "name" => "Violeta",
        ],
        [
          "name" => "Marron",
        ],
        [
          "name" => "Gris",
        ],
        [
          "name" => "Rosa",
        ],
        [
          "name" => "Bordo",
        ],
        [
          "name" => "Salmon",
        ],
        [
          "name" => "Beige",
        ],
        [
          "name" => "Celeste",
        ],
        [
          "name" => "Verde",
        ]
      ]);
    }
}
