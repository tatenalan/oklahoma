<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
       DB::table('categories')->insert([
         [
           "name" => "Remera",
         ],

         [
           "name" => "Camisa",
         ],

         [
           "name" => "Jean",
         ],

         [
           "name" => "Buzo",
         ],

         [
           "name" => "Campera",
         ],

         [
           "name" => "Accesorio",
         ]
       ]);
     }
}
