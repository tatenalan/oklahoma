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
      $this->call(GenresSeeder::class);
      $this->call(CategoriesSeeder::class);
      $this->call(ProductsSeeder::class);
      $this->call(ColorsSeeder::class);
      $this->call(ProductoImagenSeeder::class);
      $this->call(UsersSeeder::class);
    }
}
