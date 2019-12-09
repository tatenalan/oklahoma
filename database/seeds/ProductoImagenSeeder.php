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
        'accesorio1a.jpg',
        'accesorio2a.jpg',
        'accesorio2b.jpg',
        'accesorio3a.jpg',
        'accesorio3b.jpg',
        'accesorio4a.jpg',
        'accesorio4b.jpg',
        'accesorio5a.jpg',
        'accesorio5b.jpg',
        'accesorio6a.jpg',
        'accesorio6b.jpg',
        'accesorio7a.jpg',
        'accesorio7b.jpg',
        'accesorio8a.jpg',
        'accesorio8b.jpg',
        'buzo2a.jpg',
        'buzo3a.jpg',
        'buzo4a.jpg',
        'buzo5a.jpg',
        'buzo6a.jpg',
        'buzo7a.jpg',
        'buzo8a.jpg',
        'buzo9a.jpg',
        'buzo10a.jpg',
        'buzo11a.jpg',
        'buzo2b.jpg',
        'buzo3b.jpg',
        'buzo4b.jpg',
        'buzo5b.jpg',
        'buzo6b.jpg',
        'buzo7b.jpg',
        'buzo8b.jpg',
        'buzo9b.jpg',
        'buzo10b.jpg',
        'buzo11b.jpg',
        'camisa1.jpg',
        'camisa2a.jpg',
        'camisa3a.jpg',
        'camisa4a.jpg',
        'camisa5a.jpg',
        'camisa6a.jpg',
        'camisa7a.jpg',
        'camisa8a.jpg',
        'camisa9a.jpg',
        'camisa2b.jpg',
        'camisa3b.jpg',
        'camisa4b.jpg',
        'camisa5b.jpg',
        'camisa6b.jpg',
        'camisa7b.jpg',
        'camisa8b.jpg',
        'camisa9b.jpg',
      ];
      $i=1;
      foreach ($imagenes as $key => $image) {
      DB::table('images')->insert([
          "product_id" => $i,
          "path" => $image,
        ]);
        $i++;
      }
    }
}
