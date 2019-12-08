<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Category;
class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $productos = Product::all();
      $categories = Category::all();
      $vac = compact('productos','categories');
      return view('productos',$vac);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $form)
    {
      $reglas = [
        'name' => 'required|string|min:3|max:12',
        'price' => 'required|integer|min:50|max:15000',
        'discount' => 'required|integer|min:0|max:80',
        'genre_id' => 'required',
        'poster' => "file"
      ];
      $mensajes = [
        "required" => "El campo :attribute no puede estar vacio",
        'string' => "El campo :attribute debe ser un texto",
        "min" => "El campo :attribute tiene un minimo de :min caracteres",
        "max" => "El campo :attribute tiene un maximo de :max caracteres",
      ];

      $this->validate($form,$reglas,$mensajes);

      $product = new Product();

      $ruta = $form->file("poster")->store("public");
      $nombreDelArchivo = basename($ruta);
      $product->poster = $nombreDelArchivo;

      $product->name = $form['name'];
      $product->price = $form['price'];
      $product->onSale = $form['onSale'];
      $product->discount = $form['discount'];
      $product->genre_id = $form['genre_id'];
      $product->category_id = $form['category_id'];
      $product->save();
      return redirect('/home');
    }

    public function home(){
      $productos = Product::all();
      $categories = Category::all();
      $vac = compact('productos','categories');
      return view('home',$vac);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
