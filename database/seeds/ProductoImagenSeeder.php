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
          'campera1a.jpg',
          'campera2b.jpg'
        ],
        [
        'camisa2a.jpg',
        'camisa2b.jpg',
      ],
        [
        'accesorio8a.jpg',
        'accesorio8b.jpg',
      ],
        [
        'accesorio5a.jpg',
        'accesorio5b.jpg',
      ],
        [
        'jean10a.jpg',
        'jean10b.jpg',
      ],
        [
        'jean8a.jpg',
        'jean8b.jpg',
      ],
        [
        'remera3a.jpg',
        'remerab.jpg',
      ],
        [
        'remera2a.jpg',
        'remera2b.jpg',
      ],
        [
        'buzo5a.jpg',
        'buzo5b.jpg',
      ],
        [
        'buzo9a.jpg',
        'buzo9b.jpg',
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
