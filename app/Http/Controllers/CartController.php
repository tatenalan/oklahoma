<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use App\Stock;
use Illuminate\Support\Facades\Auth;
class CartController extends Controller
{
  public function addProduct(Request $request)
  {
      // Al agregar un producto instanciamos un nuevo carrito
      $cart = new Cart;
      // Buscamos los valores de ese producto en particular
      $product = Product::find($request->id);
      // Los relacionamos
      $cart->product_id = $product->id;
      $cart->user_id = Auth::user()->id;
      // Instanciamos sus valores
      $cart->size = $request->size;
      $cart->quantity = $request->quantity;
      // Si el mismo usuario pide 2 veces el mismo producto
      $repeat = Cart::where('user_id', '=', Auth::user()->id)->where('product_id', '=', $product->id)->where('size' , '=',$cart->size)->get();
      if (isset($repeat[0])) {
        $repeat[0]->quantity = $repeat[0]->quantity + $cart->quantity;
        $repeat[0]->save();
        return redirect('/cart');
      }
      $cart->save();

      return redirect('/cart');
  }

  public function show(){
    $carts = Cart::where('user_id', '=', Auth::user()->id)->with('products')->get();
    return view('/cart',compact('carts'));
  }

  public function deleteFromCart(Request $request)
  {

    $cart = Cart::find($request->cart_id);
    $cart->delete();

    return redirect('/cart');
  }

  public function buyProduct(Request $request){
    // El foreach recorre el array de ids
    foreach ($request->id as $id) {
      // traemos cada carrito con sus valores
      $cart = Cart::find($id);
      // Obtengo el valor del talle y lo guardo en una variable (Elejido por la persona M S L XL)
      $size = $cart->size;
      // Obtengo su objeto de tipo stock y lo guardo en una variable
      $stock = $cart->products->stock;
      // Le restamos al stock de la talla elejida, la cantidad de objetos comprados
      $stock->$size = $stock->$size - $cart->quantity;
      // guardamos los cambios realizados en el stock
      $stock->save();
      // Por cada id, trae un carrito y lo elimina
      $cart = Cart::find($id);
      $cart->delete();
    }
    return redirect('/cart');
  }






  //recibe un producto con todas sus columnas pero con talle y cantidad especificos
  // limitar la cantidad y el talle segun el Stock
  // hacer la cuenta matematica de valor * cantidad
  // al tocar comprar que reste la cantidad comprada
}
