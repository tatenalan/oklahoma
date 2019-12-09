<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;
use App\Genre;
use App\Category;

$factory->define(Product::class, function (Faker $faker) {
    $genres = Genre::all();
    $categories = Category::all();
    $onSale = $faker->boolean(40);
    if ($onSale) {
      $discount = $faker->numberBetween(10,80);
    }
    else {
      $discount = 0;
    }
    return [
      'name' => $faker->name,
      'price' => $faker->numberBetween(1000,2500),
      'onSale' => $onSale,
      'discount' => $discount,
      'genre_id' => $genres->random(),
      'category_id' => $categories->random(),
    ];
});
