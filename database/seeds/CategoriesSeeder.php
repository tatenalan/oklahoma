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
       DB::table('categories')->insert(
         [
           "name" => "Remeras",
         ]
       );

       DB::table('categories')->insert(
         [
           "name" => "Camisas",
         ]
       );

       DB::table('categories')->insert(
         [
           "name" => "Jeans",
         ]
       );

        DB::table('categories')->insert(
         [
           "name" => "Buzos",
         ]
       );

        DB::table('categories')->insert(
         [
           "name" => "Camperas",
         ]
       );

        DB::table('categories')->insert(
         [
           "name" => "Accesorios",
         ]
       );
     }
}
