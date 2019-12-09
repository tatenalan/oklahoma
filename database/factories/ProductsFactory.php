<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;
use App\Genre;
use App\Category;

$factory->define(Product::class, function (Faker $faker) {
    $genres = Genre::all();
    $categories = Category::all();
    return [
      'name' => $faker->name,
      'price' => $faker->numberBetween(1000,2500),
      'onSale' => true,
      'discount' => $faker->numberBetween(0,80),
      'genre_id' => $genres->random(),
      'category_id' => $categories->random(),
    ];
});
