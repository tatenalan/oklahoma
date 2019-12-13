<?php

use Illuminate\Database\Seeder;

class ProductoImagenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $imagenes= [
        [
          'accesorio2a.jpg',
          'accesorio2b.jpg'
        ],
        [
        'accesorio3a.jpg',
        'accesorio3b.jpg',
      ],
        [
        'accesorio4a.jpg',
        'accesorio4b.jpg',
      ],
        [
        'accesorio5a.jpg',
        'accesorio5b.jpg',
      ],
        [
        'accesorio6a.jpg',
        'accesorio6b.jpg',
      ],
        [
        'accesorio7a.jpg',
        'accesorio7b.jpg',
      ],
        [
        'accesorio8a.jpg',
        'accesorio8b.jpg',
      ],
        [
        'buzo2a.jpg',
        'buzo2b.jpg',
      ],
        [
        'buzo3a.jpg',
        'buzo3b.jpg',
      ],
        [
        'buzo4a.jpg',
        'buzo4b.jpg',
      ]];
      $i=1;
      foreach ($imagenes as $key => $image) {
        foreach ($image as $key => $img) {
          // code...
      DB::table('images')->insert([
          "product_id" => $i,
          "path" => $img,
        ]);
      }
        $i++;
      }
    }
}
