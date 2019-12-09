<?php

use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
         DB::table('products')->insert(
           [
             "name" => "HR Sunny",
             "price" => "300",
             "onSale" => false,
             "discount" => 0,
             "genre_id" => 1,
             "category_id" => 1,
           ]
         );
        // factory(App\Product::class,2)->create();
     }
}
