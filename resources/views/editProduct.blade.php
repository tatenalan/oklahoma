@extends('layouts/plantilla')
@section('titulo')
Edit Product
@endsection
@section('css')
forms
@endsection
@section('main')
  <div class="container">
    <h5 class="centrado titulo">Editar Producto</h5>

        <!-- Vista de edicion del Producto-->
      <form class="form-signup" action='/product/{{$product['id']}}' method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="PUT">  {{--<!-- alternativa @method('put') --}}

        <div class="row">
          <div class="col-8 col-lg-4 offset-lg-2 col-md-6 form-group">
            <label for="">Nombre: *</label>
            <input type="text" class="form-control" name="name" value="{{ old('name',$product->name)}}"> <?php // Se le pone el old(name, product name) No solo para que agarre los datos del nombre sino para que tambien persistan los cambios ante un error ?>
            @error('name')
              <p class="errorForm">{{ $message }}</p>
            @enderror
          </div>

          <div class="col-4 col-lg-4 col-md-6 form-group">
            <label for="">Precio: *</label>
            <input type="number" class="form-control" min="100" max="15000" step="100" name="price" value="{{ old('price',$product->price)}}">
            @error('price')
              <p class="errorForm">{{ $message }}</p>
            @enderror
          </div>
        </div>

        <div class="row">
          <div class="col-6 col-lg-4 offset-lg-2 col-md-6 form-group">
            <div class="form-group">
              <label for="">En descuento? : </label>
              <select class="form-control" name="onSale">
                  <option value =0 @if($product->onSale == 0) selected @endif>No esta en oferta</option>
                  <option value =1 @if($product->onSale == 1) selected @endif>Esta en oferta</option>
              </select>
            </div>
          </div>

          <div class="col-6 col-lg-4 col-md-6 form-group">
            <label for="">Descuento: </label>
            <input class="cantidad form-control" type="number" name="discount" min="0" max="80" step="5" value="{{ old('discount',$product->discount)}}">
          </div>
          @error('discount')
            <p class="errorForm">{{ $message }}</p>
          @enderror
        </div>

        <div class="row">
          <div class="col-6 col-lg-4 offset-lg-2 col-md-6 form-group">
            <label for="">Genero: *</label>
            <select class="form-control" name="genre_id">
              <option value="">Seleccione un genero</option>
              @foreach ($genres as $genre)
                <option value="{{$genre->id}}" @if($genre->id == $product->genre_id) selected @endif>{{$genre->name}}</option>
              @endforeach
            </select>
            @error('genre_id')
              <p class="errorForm">{{ $message }}</p>
            @enderror
          </div>


          <div class="col-6 col-lg-4 col-md-6 form-group">
            <label for="">Categoria: *</label>
            <select class="form-control" name="category_id">
              <option value="">Seleccione una categoria</option>
              @foreach ($categories as $category)
                <option value="{{$category->id}}" @if($category->id == $product->category_id) selected @endif>{{$category->name}}</option>
              @endforeach
            </select>
            @error('category_id')
              <p class="errorForm">{{ $message }}</p>
            @enderror
          </div>
        </div>


        @if ($product->stock_id)

          <div class="row">
            <div class="col-4 col-md-2 offset-md-1 form-group">
              <label for="">XS: </label>
              <input class="cantidad form-control" type="number" class="form-control" name="xs" min="0" max="100" step="1" value="0">
              @error('xs')
                <p class="errorForm">{{ $message }}</p>
              @enderror
            </div>
            <div class="col-4 col-md-2 form-group">
              <label for="">S: </label>
              <input class="cantidad form-control" type="number" class="form-control" name="s" min="0" max="100" step="1" value="{{$product->stock->S}}">
              @error('s')
                <p class="errorForm">{{ $message }}</p>
              @enderror
            </div>

            <div class="col-4 col-md-2 form-group">
              <label for="">M: </label>
              <input class="cantidad form-control" type="number" class="form-control" name="m" min="0" max="100" step="1" value="{{$product->stock->M}}">
              @error('m')
                <p class="errorForm">{{ $message }}</p>
              @enderror
            </div>

            <div class="col-4 col-md-2 form-group">
              <label for="">L: </label>
              <input class="cantidad form-control" type="number" class="form-control" name="l" min="0" max="100" step="1" value="{{$product->stock->L}}">
              @error('l')
                <p class="errorForm">{{ $message }}</p>
              @enderror
            </div>

            <div class="col-4 col-md-2 form-group">
              <label for="">XL: </label>
              <input class="cantidad form-control" type="number" class="form-control" name="xl" min="0" max="100" step="1" value="{{$product->stock->XL}}">
              @error('xl')
                <p class="errorForm">{{ $message }}</p>
              @enderror
            </div>
          </div>
          @else

          <div class="row">
            <div class="col-4 col-md-2 offset-md-1 form-group">
              <label for="">XS: </label>
              <input class="cantidad form-control" type="number" class="form-control" name="xs" min="0" max="100" step="1" value="0">
              @error('xs')
                <p class="errorForm">{{ $message }}</p>
              @enderror
            </div>

            <div class="col-4 col-md-2 form-group">
              <label for="">S: </label>
              <input class="cantidad form-control" type="number" class="form-control" name="s" min="0" max="100" step="1" value="0">
              @error('s')
                <p class="errorForm">{{ $message }}</p>
              @enderror
            </div>

            <div class="col-4 col-md-2 form-group">
              <label for="">M: </label>
              <input class="cantidad form-control" type="number" class="form-control" name="m" min="0" max="100" step="1" value="0">
              @error('m')
                <p class="errorForm">{{ $message }}</p>
              @enderror
            </div>

            <div class="col-4 col-md-2 form-group">
              <label for="">L: </label>
              <input class="cantidad form-control" type="number" class="form-control" name="l" min="0" max="100" step="1" value="0">
              @error('l')
                <p class="errorForm">{{ $message }}</p>
              @enderror
            </div>

            <div class="col-4 col-md-2 form-group">
              <label for="">XL: </label>
              <input class="cantidad form-control" type="number" class="form-control" name="xl" min="0" max="100" step="1" value="0">
              @error('xl')
                <p class="errorForm">{{ $message }}</p>
              @enderror
            </div>
          </div>
        @endif

        <div class="form-group">
          <button type="submit" hidden id="botongeneral" class="btn btn-info" value="Edit Product">Editar producto</button>
        </div>
      </form>

      <form class="" action="/agregarimagen" method="post" enctype="multipart/form-data">
        @csrf


        <div class="row">
          <div class="col-lg-4 offset-lg-2 col-md-6 form-group">
            <label for="">Agregar imagenes al producto</label><br>
            <label for="file-upload" class="subir"><i class="fas fa-cloud-upload-alt"></i> Subir archivo</label>
            <input type="file" id="file-upload" onchange='change()' style='display: none;' name="images[]" value="" multiple >
            <div id="info"></div>
            @error('images')
              <p class="errorForm">{{ $message }}</p>
            @enderror
            @error('images.*')
              <p class="errorForm">{{ $message }}</p>
            @enderror
            <small id="emailHelp" class="form-text text-muted">Extensiones: jpg, jpeg, png. Peso maximo 2mb</small>
            <input type="hidden" name="productid" value="{{$product->id}}"><br>
            <button type="submit" class="btn btn-success" value="">Agregar imagen</button>
          </div>
        </div>
      </form>


      <div class="flex">
        @foreach ($product->images as $image)
          <form class="" action="/eliminarimagen" method="post">
            @csrf
            <img class="product-img" style="margin-bottom:10px;margin-top:10px;" src="/storage/{{$image->path}}" alt=""><br>
            <input type="hidden" name="imagenid" value="{{$image->id}}">
            <button type="submit" class="eliminar-imagen" name="">X</button>
          </form>
        @endforeach
      </div>

        <br>
      <div class="flex">
        <label class="btn btn-info" for="botongeneral">Editar producto</label>
        <form class="" onclick="confirmar()" action="/delete/product/{{$product->id}}" method="post">
          @csrf
          <button type="submit" class="btn btn-danger">Eliminar producto</button>
        </form>
      </div>

  </div>

  {{-- Lo que hace este script es tomar el nombre del archivo que queremos subir y ponerlo dentro el elemento con la clase info para que podamos verlo. --}}
    <script>function change(){
      var pdrs = document.getElementById('file-upload').files[0].name;
      document.getElementById('info').innerHTML = pdrs;
    }</script>

@endsection
