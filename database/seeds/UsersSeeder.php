<?php

use Illuminate\Database\Seeder;
use App\Cart;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // $cart = new cart;
      // $cart->save();

      DB::table('users')->insert(
        [
          "first_name" => 'Admin',
          "last_name" => 'admin',
          "email" => 'admin@admin.com',
          "password" => Hash::make('123456'),
          "isAdmin" => true,
          "birthDate" => '1990-10-1',
          "address" => 'zapiola 850',
          "avatar" => 'admin.png',
          // "cart_id" => $cart->id,
        ]
      );
    }
}
