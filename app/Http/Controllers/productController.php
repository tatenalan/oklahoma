<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Genre;
use App\Image;
use App\Stock;
class ProductController extends Controller
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
       return view('/main',$vac);
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
       return view('addProduct',$vac);
     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request) // agrega un producto y te redirige a la lista de productos
    {

      // Declaro las variables de validacion

      $reglas = [
        'name' => 'required|string|min:1|max:50',
        'price' => 'required|integer|min:50|max:150000',
        'discount' => 'integer|min:10|max:80', // para hacer required discount hay que tenerlo hidden siempre
        'genre_id' => 'required',
        'category_id' => 'required',
        "images" => "required|array|min:1",
        "images.*" => 'image|mimes:jpg,jpeg,png|max:2048',
        'xs' => 'required',
        's' => 'required',
        'm' => 'required',
        'l' => 'required',
        'xl' => 'required',
        't30' => 'required',
        't32' => 'required',
        't34' => 'required',
        't36' => 'required',
        't38' => 'required',
        't40' => 'required',
        't42' => 'required',
        't44' => 'required',
        't46' => 'required',
        't48' => 'required',
      ];


      $mensajes = [
        "name.required" => "Ingrese el nombre del producto",
        "price.required" => "Ingrese el precio del producto",
        "genre_id.required" => "Seleccione el genero",
        "category_id.required" => "Seleccione la categoria",
        'string' => "El campo :attribute debe ser un texto",
        "price.min" => "El precio debe ser mayor a $50",
        "min" => "El campo :attribute tiene un minimo de :min caracteres",
        "max" => "El campo :attribute tiene un maximo de :max caracteres",
        "images.*.image" => "Debe ser un formato de imagen",
        "mimes" => "Formato de imagen invalido",
        "images.*.max" => 'La imagen es muy pesada',
        "images.min" => "Debes subir al menos una imagen",
        "images.required" => "Sube una imagen del producto",
        "discount.min" => "Debe tener al menos un 10% de descuento",
      ];

      // Validamos
      $this->validate($request,$reglas,$mensajes);

      // Instancio un stock
      $stock = new Stock;
      $stock->XS = $request->xs;
      $stock->S = $request->s;
      $stock->M = $request->m;
      $stock->L = $request->l;           // los campos que escribimos aca deben estar presentes en el form de creacion!
      $stock->XL = $request->xl;
      $stock->T30 = $request->t30;
      $stock->T32 = $request->t32;
      $stock->T34 = $request->t34;
      $stock->T36 = $request->t36;
      $stock->T38 = $request->t38;
      $stock->T40 = $request->t40;
      $stock->T42 = $request->t42;
      $stock->T44 = $request->t44;
      $stock->T46 = $request->t46;
      $stock->T48 = $request->t48;

      // dd($request);

      // guardo en la base de datos
      $stock->save();

      // Instancio un producto
      $product = new Product();
      $product->name = $request['name']; // alternativa $producto->name = $request->name;
      $product->price = $request['price'];
      $product->onSale = $request['onSale'];
      $product->discount = $request['discount'];
      $product->genre_id = $request['genre_id'];
      $product->category_id = $request['category_id'];
      $product->stock_id = $stock->id ;  // modifique, antes era asi : $product->stock_id = $stock->id; Por ende no necesitamos la columna FK stock_id

      // guardo en la base de datos
      $product->save();


      // traigo el producto recien creado para obtener su ID
      $lastProduct = Product::all()->last();
      $productId = $lastProduct->id;


      if (!empty($request['images'])) { // si suben una o mas fotos, entonces comenzamos el proceso de guardado ALTERNATIVA: if($request->images)
        // obtengo el array de imagenes
        $images = $request->file('images');
        // traigo las imagenes y recorro el array
        foreach ($images as $image) {
          // guardo cada imagen en storage/public (no en la base de datos)
          $file = $image->store('public');
          // obtengo sus nombres
          $path = basename($file);


          // por cada imagen instancio un objeto de la clase imagen
          $image = new Image;
          // asigno las rutas correspondientes y asigno el id de la imagen que debe ser igual al id del ultimo producto creado
          $image->product_id = $productId;
          $image->path = $path;

          // guardo el objeto imagen instanciado en la base de datos
          $image->save();
        }
      }


      // Redirijo
      return redirect('/')
      ->with('status', 'Producto creado exitosamente!!!')
      ->with('operation', 'success');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */

    public function show($id) // se muestran los datos del producto elegido
    {
      $product = Product::find($id);
      $image = Image::where('product_id', '=', $id)->get();
      // $category = Category::find($id); si no lo llamo de esta manera utilizo la relacion del modelo. Ver Product.blade.php {{$product->category->name}}
      $stock = Stock::where('id', '=', $product->stock_id)->get();
      $vac = compact('product', 'image', 'stock');
      return view('product',$vac);
    }

    public function edit($id) // se muestran los datos del producto elegido listo para editar
    {
      $product = Product::find($id);
      $genres = Genre::all();
      $images = Image::where('product_id', '=', $id)->get();
      $categories = Category::all();
      $stock = Stock::find($id);

      return view('/editProduct', compact('product', 'genres', 'categories','images' , 'stock'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */


    public function update(Request $request, int $id) // se muestra el producto con los campos completos listo para editar. A diferencia de guardar, update lleva tambien la variable $id
    {
        // Declaro las variables de validacion

      $reglas = [
      'name' =>'required|string|min:2|max:40|',
      'price' =>'required|numeric|min:0|max:100000|',
      'onSale' => 'required',
      'discount' => 'integer|min:0|max:80',
      'genre_id' => 'required',
      'category_id' => 'required',
      "images" =>  "array",
      "images.*" => "image|mimes:jpeg,png|max:2000",
      'xs' => 'required|integer|min:0|max:1000',
      's' => 'required|integer|min:0|max:1000',
      'm' => 'required|integer|min:0|max:1000',
      'l' => 'required|integer|min:0|max:1000',
      'xl' => 'required|integer|min:0|max:1000',
      ];

      $mensajes = [
      "required" => "El campo es obligatorio",
      "string" => "El campo debe ser un texto",
      "min" => "El minimo es de :min caracteres",
      "max" => "El maximo es de :max caracteres",
      "date" => "El campo :date debe ser una fecha",
      "integer" => "El campo debe ser un numero entero",
      "numeric" => "El campo debe ser un numero",
      "images.*.image" => "Debe ser un formato de imagen",
      "mimes" => "Formato de imagen invalido",
      "images.*.max" => 'La imagen es muy pesada',
      ];

      // Validamos
      $this->validate($request, $reglas, $mensajes);
      // llamo al producto a editar
      // $imagenes = $request->file('images');
      //

      $product = Product::find($id);
      // busco el stock del producto a editar

      $product->stock->XS = $request->xs;
      $product->stock->S = $request->s;
      $product->stock->M = $request->m;
      $product->stock->L = $request->l;
      $product->stock->XL = $request->xl;

      // guardo en la base de datos
      $product->stock->save();

      $product->name = $request['name']; // alternativa $producto->name = $request->name;
      $product->price = $request['price'];
      $product->onSale = $request['onSale'];
      $product->discount = $request['discount'];
      $product->genre_id = $request['genre_id'];
      $product->category_id = $request['category_id'];
      $product->save();

      $images = $product->images;
      // guardo en la base de datos
      // Si cambian una foto, se eliminan todas las anteriores
      if ($request->file('images')) {
        //recorro cada imagen y la deslinkeo
        foreach ($images as $image) {
          $image_path = storage_path('app/public/').$image->path;
          // se elimina la foto del storage
          unlink($image_path);
          // se elimina la foto de la base de datos
          $image->delete();
        }

        // creo la variable que contiene todas las imagenes del input
        $imagenes = $request->file('images');

        // por cada imagen
        foreach ($imagenes as $imagen) {
          //guarda cada imagen en storage/public (No en la DB)
          $file = $image->store('public');
          //Obtengo sus nombres
          $path = basename($file);
          // Por cada imagen instancio un objeto de la clase imagen
          $image = new Image;
          // asigno las rutas correspondientes y el id de la imagen
          $image->product_id = $product->id;
          $image->path = $path;
          // guardo el objeto imagen instanciado en la base de datos
          $image->save();
        }
      }


      // si cambian la foto
      // obtenemos la ruta de la foto anterior
      // verificamos si existe en la base de datos y en storage
      // elimina la foto del storage


      // Redirijo
      return redirect('/product/'.$product->id)
      ->with('status', 'Producto editado exitosamente!!!')
      ->with('operation', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */

    public function showCategory($categ)  // a prueba
    {
      // $category = Category::where('name', '=', $categ)->get();
      // return view('/category', compact('category', 'products'));
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
      return view('buzos',$vac);
    }

    public function camperas(Product $product)
    {
      $products = Product::where('category_id', 'like', '5')->orderBy('price')->get();
      $category = Category::where('name', 'like', 'Campera')->get();
      $vac = compact('products','category');
      return view('camperas',$vac);
    }

    public function accesorios(Product $product)
    {
      $products = Product::where('category_id', 'like', '6')->orderBy('price')->get();
      $category = Category::where('name', 'like', 'Accesorio')->get();
      $vac = compact('products','category');
      return view('accesorios',$vac);
    }

    public function ofertas(Product $product)
    {
      $products = Product::where('onSale', '=', true)->orderBy('price')->get();
      $category = Category::all();
      $vac = compact('products','category');
      return view('ofertas',$vac);
    }

    public function search()
    {
      $products = Product::where('name', 'like', '%'. $_GET['search']. '%')->orderBy('price','desc')->get();
      return view('/search', compact('products'));
    }

    public function delete(int $id){ // borrar producto y deslinkear cualquier relacion, en este caso, borra sus imagenes y su stock
      // llamamos al producto a eliminar mediante su id
      $product = Product::find($id);
      $images = $product->images;
      $stock = $product->stock;

      foreach ($images as $image) {
      // por cada imagen seleccionamos su path y si existe la borramos de storage
      $image_path = storage_path('app/public/') . $image->path;
      // verificamos si existe en la base de datos y en storage
        if ($images && file_exists($image_path)) {
          // elimina las imagenes de storage
          unlink($image_path);
          // borramos las imagenes de la bd utilizando la relacion del modelo
          $image->delete();
        }
      }

      $stock->delete();
      $product->delete(); // borramos el producto
      return redirect("/");
    }

    public function agregarimagen(Request $request){

      $reglas = [
        "images" => "required|array",
        "images.*" => "image|mimes:jpeg,png|max:2000",
      ];


      $mensajes = [
        "images.*.image" => "Debe ser un formato de imagen",
        "mimes" => "Formato de imagen invalido",
        "images.*.max" => 'La imagen es muy pesada',
        "images.required" => "Debes subir una imagen"

      ];

      // Validamos
      $this->validate($request, $reglas, $mensajes);

      // si suben una o mas fotos, entonces comenzamos el proceso de guardado
      if ($request->file('images')) {
        // traigo las imagenes a agregar
        $images = $request->file('images');
        // recorro el array con un foreach
        foreach ($images as $image) {
          // guardo cada imagen en storage/public (no en la base de datos)
          $file = $image->store('public');
          // obtengo sus nombres
          $path = basename($file);
          // por cada imagen instancio un objeto de la clase imagen
          $image = new Image;
          // asigno las rutas correspondientes y asigno el id de la imagen que debe ser igual al id del ultimo producto creado
          $image->product_id = $request->productid;
          $image->path = $path;

          // guardo el objeto imagen instanciado en la base de datos
          $image->save();
          // nos retorna a la ruta anterior
          }
        }
        return back();
      }

    public function eliminarimagen(Request $request){
      // traigo la imagen del request imagenid (name del file)
      $image = Image::find($request->imagenid);
      // elimina las imagenes de storage
      unlink(storage_path('app/public/').$image->path);
      // borramos las imagenes de la bd
      $image->delete();
      // nos retorna a la ruta anterior
      return back();
    }
}
