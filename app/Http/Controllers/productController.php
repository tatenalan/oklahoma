<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Genre;
use App\Image;
use App\Stock;
class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function directory(Product $product)
     {
       $products = Product::all();
       $categories = Category::all();
       $images = Image::all();
       $vac = compact('products','categories','images');
       return view('main',$vac);
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function new() // Se muestra un form con los campos vacios para agregar un producto
     {
       $products = Product::all();
       $categories = Category::all();
       $genres = Genre::all();
       $vac = compact('products','categories', 'genres');
       return view('products/addProduct',$vac);
     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $form) // agrega un producto y te redirige a la lista de productos
    {

      // Declaro las variables de validacion

      $reglas = [
        'name' => 'required|string|min:1|max:50',
        'price' => 'required|integer|min:50|max:15000',
        'discount' => 'required|integer|min:0|max:80',
        'genre_id' => 'required',
        'category_id' => 'required',
      ];


      $mensajes = [
        "required" => "El campo :attribute no puede estar vacio",
        'string' => "El campo :attribute debe ser un texto",
        "min" => "El campo :attribute tiene un minimo de :min caracteres",
        "max" => "El campo :attribute tiene un maximo de :max caracteres",
      ];


      // Validamos
      $this->validate($form,$reglas,$mensajes);

      // Instancio un producto
      $product = new Product();


      $product->name = $form['name']; // alternativa $producto->name = $request->name;
      $product->price = $form['price'];
      $product->onSale = $form['onSale'];
      $product->discount = $form['discount'];
      $product->genre_id = $form['genre_id'];
      $product->category_id = $form['category_id'];

      // guardo en la base de datos
      $product->save();

      // Instancio un stock
      $stock = new Stock;
      $stock->XS = $form->xs;
      $stock->S = $form->s;
      $stock->M = $form->m;
      $stock->L = $form->l;
      $stock->XL = $form->xl;

      // guardo en la base de datos
      $stock->save();

      // traigo el producto recien creado para obtener su ID
      $lastProduct = Product::all()->last();
      $productId = $lastProduct->id;

      if (!empty($form['images'])) { // si suben una o mas fotos, entonces comenzamos el proceso de guardado ALTERNATIVA: if($request->images)
        // obtengo el array de imagenes
        $images = $form->file('images');
        // traigo las imagenes y recorro el array
        // $images = Image::all();
        foreach ($images as $image) {
          // guardo cada imagen en storage/public
          $file = $image->store('public');
          // obtengo sus nombres
          $path = basename($file);
          // por cada imagen instancio un objeto de la clase imagen
          $image = new Image;
          // asigno las rutas correspondientes
          $image->product_id = $productId;
          $image->path = $path;
          // guardo las imagenes
          $image->save();
        }
      }

      // Redirijo
      return redirect('/main')
      ->with('status', 'Producto creado exitosamente!!!')
      ->with('operation', 'success');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
      $product = Product::find($id);
      $image = Image::where('product_id', '=', $id)->get();
      // $category = Category::find($id); si no lo llamo de esta manera utilizo la relacion del modelo. Ver Product.blade.php {{$product->category->name}}
       //dd($product->onSale);
      $vac = compact('product', 'image');
      return view('product',$vac);
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

    public function remeras(Product $product)
    {
      $products = Product::where('category_id', 'like', '1')->orderBy('price')->get();
      $category = Category::where('name', 'like', 'Remera')->get();
      $vac = compact('products','category');
      return view('remeras',$vac);
    }

    public function camisas(Product $product)
    {
      $products = Product::where('category_id', 'like', '2')->orderBy('price')->get();
      $category = Category::where('name', 'like', 'Camisa')->get();
      $vac = compact('products','category');
      return view('camisas',$vac);
    }

    public function jeans(Product $product)
    {
      $products = Product::where('category_id', 'like', '3')->orderBy('price')->get();
      $category = Category::where('name', 'like', 'Jean')->get();
      $vac = compact('products','category');
      return view('jeans',$vac);
    }

    public function buzos(Product $product)
    {
      $products = Product::where('category_id', 'like', '4')->orderBy('price')->get();
      $category = Category::where('name', 'like', 'Buzo')->get();
      $vac = compact('products','category');
      return view('jeans',$vac);
    }

    public function camperas(Product $product)
    {
      $products = Product::where('category_id', 'like', '5')->orderBy('price')->get();
      $category = Category::where('name', 'like', 'Campera')->get();
      $vac = compact('products','category');
      return view('jeans',$vac);
    }

    public function accesorios(Product $product)
    {
      $products = Product::where('category_id', 'like', '6')->orderBy('price')->get();
      $category = Category::where('name', 'like', 'Accesorio')->get();
      $vac = compact('products','category');
      return view('jeans',$vac);
    }

    public function ofertas(Product $product)
    {
      $products = Product::where('onSale', '=', true)->orderBy('price')->get();
      $category = Category::all();
      $vac = compact('products','category');
      return view('jeans',$vac);
    }
}
