<?php

use Illuminate\Database\Seeder;

class GenresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('genres')->insert(
        [
          "name" => "Hombre",
        ]
      );

      DB::table('genres')->insert(
        [
          "name" => "Mujer",
        ]
      );

      DB::table('genres')->insert(
        [
          "name" => "Unisex",
        ]
      );
    }
}
