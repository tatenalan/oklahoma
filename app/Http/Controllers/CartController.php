<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class CartController extends Controller
{
  public function addProduct(Request $request){
  // dd($request->all());
    $product = Product::find($request->id);
    $quantity = $request->quantity;
    $size = $request->size;
    return view('cart', compact('product', 'quantity', 'size'));







  }









  //recibe un producto con todas sus columnas pero con talle y cantidad especificos
  // limitar la cantidad y el talle segun el Stock
  // hacer la cuenta matematica de valor * cantidad
  // al tocar comprar que reste la cantidad comprada
}
