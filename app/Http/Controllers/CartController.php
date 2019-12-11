<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
  public function addProduct(Request $request){
    dd($request->all());














  }









  //recibe un producto con todas sus columnas pero con talle y cantidad especificos
  // limitar la cantidad y el talle segun el Stock
  // hacer la cuenta matematica de valor * cantidad
  // al tocar comprar que reste la cantidad comprada
}
