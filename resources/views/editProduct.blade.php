@extends('plantilla')
@section('titulo')
Edit Product
@endsection
@section('css')
contact
@endsection
@section('main')
  <div class="container">
    <h5 class="centrado titulo">Agregar Producto</h5>
    <div class="row">
      <div class="col-lg-4 offset-lg-2 col-md-6">

        <!-- Vista de edicion del Producto-->
        <form class="form-signup" action='/product/{{$product['id']}}' method="post" enctype="multipart/form-data">
          {{csrf_field()}}
          <input type="hidden" name="_method" value="PUT">  {{--<!-- alternativa @method('put') --}}

          <div class="form-group">
            <label for="">Name: </label>
            <input type="text" class="form-control" name="name" value="{{ old('name',$product->name)}}">
          </div>

          <div class="form-group">
            <label for="">Price: </label>
            <input type="number" class="form-control" name="price" value="{{ old('price',$product->price)}}">
          </div>

          <div class="form-group">
            <label for="">on sale? : </label>
            <select class="" name="onSale">
                <option value =0 @if($product->onSale == 0) selected @endif>No esta en oferta</option>
                <option value =1 @if($product->onSale == 1) selected @endif>Esta en oferta</option>
            </select>
          </div>

          <div class="form-group">
            <label for="">descuento: </label>
            <input class="cantidad" type="number" class="form-control" name="discount" min="15" max="80" step="5" value="{{ old('discount',$product->discount)}}">
          </div>

          <div class="form-group">
            <label for="">Genero: </label>
            <select class="" name="genre_id">
              <option value="">Seleccione un genero</option>
              @foreach ($genres as $genre)
                <option value="{{$genre->id}}" @if($genre->id == $product->genre_id) selected @endif>{{$genre->name}}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <label for="">Categories: </label>
            <select class="" name="category_id">
              <option value="">Seleccione una categoria</option>
              @foreach ($categories as $category)
                <option value="{{$category->id}}" @if($category->id == $product->category_id) selected @endif>{{$category->name}}</option>
              @endforeach
            </select>
          </div>

          {{-- <div class="form-group">
            <label for="">XS: </label>
            <input class="cantidad" type="number" class="form-control" name="xs" min="0" max="100" step="1" value="{{ old('xs',$stock->XS)}}">
          </div>

          <div class="form-group">
            <label for="">S: </label>
            <input class="cantidad" type="number" class="form-control" name="s" min="0" max="100" step="1" value="{{ old('s',$stock->S)}}">
          </div>

          <div class="form-group">
            <label for="">M: </label>
            <input class="cantidad" type="number" class="form-control" name="m" min="0" max="100" step="1" value="{{ old('m',$stock->M)}}">
          </div>

          <div class="form-group">
            <label for="">L: </label>
            <input class="cantidad" type="number" class="form-control" name="l" min="0" max="100" step="1" value="{{ old('l',$stock->L)}}">
          </div>

          <div class="form-group">
            <label for="">XL: </label>
            <input class="cantidad" type="number" class="form-control" name="xl" min="0" max="100" step="1" value="{{ old('xl',$stock->XL)}}">
          </div> --}}

          {{-- <div class="form-group">
            <label for="">Imagen del Producto: </label>
            <br> --}}
            {{-- para poder agregar varios archivos hay que colocar los [] en el name del file y el atributo multiple --}}
            {{-- <input type="file" name="images[]" value="" multiple>
            @php
              $image_path = storage_path('app/public/') . $images->product_id; // traemos la variable con la ruta de la imagen
            @endphp --}}

            {{-- Si las imagenes existen tanto en la bd como en storage, las muestro --}}
            {{-- @if ($images->product_id && file_exists($image_path))
              @foreach ($images as $image)
                <img class="product-img" src="/storage/{{$image->path}}" alt="">
              @endforeach
            @endif
          </div> --}}

          <div class="form-group">
            <button type="submit" class="btn btn-success" value="Edit Product">Editar producto</button>
          </div>
        </form>


      <ul style="color:red" class="errores">
        @foreach ($errors->all() as $error)
          <li>
            {{$error}}
          </li>
        @endforeach
      </ul>
  </div>
@endsection
