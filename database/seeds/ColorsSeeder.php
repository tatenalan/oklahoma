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
      DB::table('colors')->insert(
        [
          "name" => "Blanco",
        ]
      );

      DB::table('colors')->insert(
        [
          "name" => "Negro",
        ]
      );

      DB::table('colors')->insert(
        [
          "name" => "Rojo",
        ]
      );
      DB::table('colors')->insert(
        [
          "name" => "Azul",
        ]
      );
      DB::table('colors')->insert(
        [
          "name" => "Amarillo",
        ]
      );
      DB::table('colors')->insert(
        [
          "name" => "Naranja",
        ]
      );
      DB::table('colors')->insert(
        [
          "name" => "Violeta",
        ]
      );
      DB::table('colors')->insert(
        [
          "name" => "Marron",
        ]
      );
      DB::table('colors')->insert(
        [
          "name" => "Gris",
        ]
      );
      DB::table('colors')->insert(
        [
          "name" => "Rosa",
        ]
      );
      DB::table('colors')->insert(
        [
          "name" => "Bordo",
        ]
      );
      DB::table('colors')->insert(
        [
          "name" => "Salmon",
        ]
      );
      DB::table('colors')->insert(
        [
          "name" => "Beige",
        ]
      );
      DB::table('colors')->insert(
        [
          "name" => "Celeste",
        ]
      );
      DB::table('colors')->insert(
        [
          "name" => "Verde",
        ]
      );
    }
}
