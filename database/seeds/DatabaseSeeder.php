<?php

use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      $this->call(ProductsSeeder::class);
      $this->call(GenresSeeder::class);
      $this->call(CategoriesSeeder::class);
      $this->call(ColorsSeeder::class);
    }
}
