@extends('plantilla')
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
              <label for="">En oferta? : </label>
              <select id="onSale" class="form-control" name="onSale">
                  <option value =0 @if($product->onSale == 0) selected @endif>No esta en oferta</option>
                  <option value =1 @if($product->onSale == 1) selected @endif>Esta en oferta</option>
              </select>
            </div>
          </div>

          <div id="discount" @if ($product->onSale == 1) class="col-6 col-lg-4 col-md-6 form-group" @else class="hidden col-6 col-lg-4 col-md-6 form-group" @endif>
            <label for="">Descuento: </label>
            <input id="inputDiscount" class="cantidad form-control" type="number" name="discount" min="0" max="80" step="5" value="{{ old('discount',$product->discount)}}">
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


          <div id="categoria" class="col-6 col-lg-4 col-md-6 form-group">
            <label for="">Categoria: *</label>
            <select id="categoryId" class="form-control" name="category_id">
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

          <div id="talles" class="row">

            <div @if ($product->category_id != 3) class="tallesPorLetra col-4 col-md-2 offset-md-1 form-group" @else class="hidden tallesPorLetra col-4 col-md-2 offset-md-1 form-group" @endif >
              <label for="">XS: </label>
              <input class="inputAlfabetico cantidad form-control" type="number" class="form-control" name="xs" min="0" max="100" step="1" @if (old('xs') !== null) value="{{ old('xs') }}" @else value="{{$product->stock->XS}}" @endif >
              @error('xs')
                <p class="errorForm">{{ $message }}</p>
              @enderror
            </div>
            <div @if ($product->category_id != 3) class="tallesPorLetra col-4 col-md-2 form-group" @else class="hidden tallesPorLetra col-4 col-md-2 form-group" @endif >
              <label for="">S: </label>
              <input class="inputAlfabetico cantidad form-control" type="number" class="form-control" name="s" min="0" max="100" step="1" @if (old('s') !== null) value="{{ old('s') }}" @else value="{{$product->stock->S}}" @endif >
              @error('s')
                <p class="errorForm">{{ $message }}</p>
              @enderror
            </div>

            <div @if ($product->category_id != 3) class="tallesPorLetra col-4 col-md-2 form-group" @else class="hidden tallesPorLetra col-4 col-md-2 form-group" @endif>
              <label for="">M: </label>
              <input class="inputAlfabetico cantidad form-control" type="number" class="form-control" name="m" min="0" max="100" step="1" @if (old('m') !== null) value="{{ old('m') }}" @else value="{{$product->stock->M}}" @endif >
              @error('m')
                <p class="errorForm">{{ $message }}</p>
              @enderror
            </div>

            <div @if ($product->category_id != 3) class="tallesPorLetra col-4 col-md-2 form-group" @else class="hidden tallesPorLetra col-4 col-md-2 form-group" @endif>
              <label for="">L: </label>
              <input class="inputAlfabetico cantidad form-control" type="number" class="form-control" name="l" min="0" max="100" step="1" @if (old('l') !== null) value="{{ old('l') }}" @else value="{{$product->stock->L}}" @endif >
              @error('l')
                <p class="errorForm">{{ $message }}</p>
              @enderror
            </div>

            <div @if ($product->category_id != 3) class="tallesPorLetra col-4 col-md-2 form-group" @else class="hidden tallesPorLetra col-4 col-md-2 form-group" @endif>
              <label for="">XL: </label>
              <input class="inputAlfabetico cantidad form-control" type="number" class="form-control" name="xl" min="0" max="100" step="1" @if (old('xl') !== null) value="{{ old('xl') }}" @else value="{{$product->stock->XL}}" @endif >
              @error('xl')
                <p class="errorForm">{{ $message }}</p>
              @enderror
            </div>


            {{-- talles por numero (jeans, zapatillas, accesorios, etc..) --}}
            <div @if ($product->category_id == 3) class="tallesPorNumero col-4 col-md-2 offset-md-1 form-group" @else class="hidden tallesPorNumero col-4 col-md-2 offset-md-1 form-group" @endif>
              <label>30: </label>
              <input class="inputNumerico cantidad form-control" type="number" name="t30" min="0" max="100" step="1"  @if (old('30') !== null) value="{{ old('30') }}" @else value="{{$product->stock->t30}}" @endif >
              @error('t30')
                <p class="errorForm">{{ $message }}</p>
              @enderror
            </div>

            <div @if ($product->category_id == 3) class="tallesPorNumero col-4 col-md-2 form-group" @else class="hidden tallesPorNumero col-4 col-md-2 form-group" @endif>
              <label>32: </label>
              <input class="inputNumerico cantidad form-control" type="number" name="t32" min="0" max="100" step="1"  @if (old('32') !== null) value="{{ old('32') }}" @else value="{{$product->stock->t32}}" @endif >
              @error('t32')
                <p class="errorForm">{{ $message }}</p>
              @enderror
            </div>

            <div @if ($product->category_id == 3) class="tallesPorNumero col-4 col-md-2 form-group" @else class="hidden tallesPorNumero col-4 col-md-2 form-group" @endif>
              <label>34: </label>
              <input class="inputNumerico cantidad form-control" type="number" name="t34" min="0" max="100" step="1"  @if (old('34') !== null) value="{{ old('34') }}" @else value="{{$product->stock->t34}}" @endif >
              @error('t34')
                <p class="errorForm">{{ $message }}</p>
              @enderror
            </div>

            <div @if ($product->category_id == 3) class="tallesPorNumero col-4 col-md-2 form-group" @else class="hidden tallesPorNumero col-4 col-md-2 form-group" @endif>
              <label>36: </label>
              <input class="inputNumerico cantidad form-control" type="number" name="t36" min="0" max="100" step="1"  @if (old('36') !== null) value="{{ old('36') }}" @else value="{{$product->stock->t36}}" @endif >
              @error('t36')
                <p class="errorForm">{{ $message }}</p>
              @enderror
            </div>

            <div @if ($product->category_id == 3) class="tallesPorNumero col-4 col-md-2 form-group" @else class="hidden tallesPorNumero col-4 col-md-2 form-group" @endif>
              <label>38: </label>
              <input class="inputNumerico cantidad form-control" type="number" name="t38" min="0" max="100" step="1"  @if (old('38') !== null) value="{{ old('38') }}" @else value="{{$product->stock->t38}}" @endif >
              @error('t38')
                <p class="errorForm">{{ $message }}</p>
              @enderror
            </div>

            <div @if ($product->category_id == 3) class="tallesPorNumero col-4 col-md-2 offset-md-1 form-group" @else class="hidden tallesPorNumero col-4 col-md-2 offset-md-1 form-group" @endif>
              <label>40: </label>
              <input class="inputNumerico cantidad form-control" type="number" name="t40" min="0" max="100" step="1"  @if (old('40') !== null) value="{{ old('40') }}" @else value="{{$product->stock->t40}}" @endif >
              @error('t40')
                <p class="errorForm">{{ $message }}</p>
              @enderror
            </div>

            <div @if ($product->category_id == 3) class="tallesPorNumero col-4 col-md-2 form-group" @else class="hidden tallesPorNumero col-4 col-md-2 form-group" @endif>
              <label>42: </label>
              <input class="inputNumerico cantidad form-control" type="number" name="t42" min="0" max="100" step="1"  @if (old('42') !== null) value="{{ old('42') }}" @else value="{{$product->stock->t42}}" @endif >
              @error('t42')
                <p class="errorForm">{{ $message }}</p>
              @enderror
            </div>

            <div @if ($product->category_id == 3) class="tallesPorNumero col-4 col-md-2 form-group" @else class="hidden tallesPorNumero col-4 col-md-2 form-group" @endif>
              <label>44: </label>
              <input class="inputNumerico cantidad form-control" type="number" name="t44" min="0" max="100" step="1"  @if (old('44') !== null) value="{{ old('44') }}" @else value="{{$product->stock->t44}}" @endif >
              @error('t44')
                <p class="errorForm">{{ $message }}</p>
              @enderror
            </div>

            <div @if ($product->category_id == 3) class="tallesPorNumero col-4 col-md-2 form-group" @else class="hidden tallesPorNumero col-4 col-md-2 form-group" @endif>
              <label>46: </label>
              <input class="inputNumerico cantidad form-control" type="number" name="t46" min="0" max="100" step="1"  @if (old('46') !== null) value="{{ old('46') }}" @else value="{{$product->stock->t46}}" @endif >
              @error('t46')
                <p class="errorForm">{{ $message }}</p>
              @enderror
            </div>

            <div @if ($product->category_id == 3) class="tallesPorNumero col-4 col-md-2 form-group" @else class="hidden tallesPorNumero col-4 col-md-2 form-group" @endif>
              <label>48: </label>
              <input class="inputNumerico cantidad form-control" type="number" name="t48" min="0" max="100" step="1"  @if (old('48') !== null) value="{{ old('48') }}" @else value="{{$product->stock->t48}}" @endif >
              @error('t48')
                <p class="errorForm">{{ $message }}</p>
              @enderror
            </div>

          </div> <!-- cierre div de talles -->
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
    {{-- <script src="/js/editarProducto.js" charset="utf-8"></script> --}}

@endsection
