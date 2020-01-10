@extends('plantilla')
@section('titulo')
Add Product
@endsection
@section('css')
forms
@endsection
@section('main')
  <div class="container">
    <h5 class="centrado titulo">Agregar Producto</h5>

    <!-- Vista de agregar Producto-->
    <form class="form-signup" method="post" enctype="multipart/form-data"> <!-- IMPORTANTE tuve que poner el atributo novalidate al form porque me surgia un error con JS. https://www.iteramos.com/pregunta/26396/un-control-de-formulario-no-valido-con-nombre--39-39-no-es-enfocable -->
      @csrf

      <div class="row">
        <div class="col-8 col-lg-4 offset-lg-2 col-md-6 form-group">
          <label for="">Nombre: *</label>
          <input type="text" placeholder="Ingrese un nombre" class="form-control" name="name" value="{{ old('name') }}" autofocus>
          @error('name')
            <p class="errorForm">{{ $message }}</p>
          @enderror
        </div>

        <div class="col-4 col-lg-4 col-md-6 form-group">
          <label for="">Precio: *</label>
          <input type="number" class="cantidad form-control" min="0" max="50000" step="100" min="50" name="price" @if (old('price') !== null) value="{{ old('price') }}" @else value="0" @endif >
            @error('price')
              <p class="errorForm">{{ $message }}</p>
            @enderror
        </div>
      </div>

      <div class="row">
        <div class="col-6 col-lg-4 offset-lg-2 col-md-6 form-group">
          <label for="">En oferta? : </label>
          <select id="onSale" class="form-control" name="onSale">
              <option value =0  {{(0 == old('onSale'))?'selected': ''}}>No esta en oferta</option>
              <option value =1  {{(1 == old('onSale'))?'selected': ''}}>Esta en oferta</option>
          </select>
        </div>

        <div id="discount" @if (old('onSale') == 1) class="col-6 col-lg-4 col-md-6 form-group" @else class="hidden col-6 col-lg-4 col-md-6 form-group" @endif>
          <label>Descuento: </label>
          <input class="cantidad form-control" type="number" name="discount" max="80" min="10" step="5" @if (old('discount') !== null) value="{{ old('discount') }}" @else value="0" @endif >
            @error('discount')
              <p class="errorForm">{{ $message }}</p>
            @enderror
        </div>

      </div>

      <div class="row">

        <div class="col-6 col-lg-4 offset-lg-2 col-md-6 form-group">
          <label for="">Genero: *</label>
          <select class="form-control" name="genre_id">
            <option value="">Seleccione un genero</option>
            @foreach ($genres as $genre)
              <option value="{{$genre->id}}" {{($genre->id == old('genre_id'))?'selected': '' }}>{{$genre->name}}</option>
            @endforeach
          </select>
          @error('genre_id')
            <p class="errorForm">{{ $message }}</p>
          @enderror
        </div>

        <div class="col-6 col-lg-4 col-md-6 form-group">
          <label for="">Categoria: *</label>
          <select id="categoryId" class="form-control" name="category_id">
            <option value="">Seleccione una categoria</option>
            @foreach ($categories as $category)
              <option value="{{$category->id}}" {{($category->id == old('category_id'))?'selected': ''}}>{{$category->name}}</option>
            @endforeach
          </select>
          @error('category_id')
            <p class="errorForm">{{ $message }}</p>
          @enderror
        </div>

      </div>

      <div id="talles" class="row">

        {{-- En este div se crean las opciones de talle --}}


        {{-- talles por letra (remeras, camisas, camperas...etc) --}}
        <div class="hidden tallesPorLetra col-4 col-md-2 offset-md-1 form-group">
          <label for="">XS: </label>
          <input class="cantidad form-control" type="number" name="xs" min="0" max="100" step="1" @if (old('xs') !== null) value="{{ old('xs') }}" @else value="0" @endif >
          @error('xs')
            <p class="errorForm">{{ $message }}</p>
          @enderror
        </div>

        <div class="hidden tallesPorLetra col-4 col-md-2 form-group">
          <label for="">S: </label>
          <input class="cantidad form-control" type="number" name="s" min="0" max="100" step="1" @if (old('s') !== null) value="{{ old('s') }}" @else value="0" @endif >
          @error('s')
            <p class="errorForm">{{ $message }}</p>
          @enderror
        </div>

        <div class="hidden tallesPorLetra col-4 col-md-2 form-group">
          <label for="">M: </label>
          <input class="cantidad form-control" type="number" name="m" min="0" max="100" step="1" @if (old('m') !== null) value="{{ old('m') }}" @else value="0" @endif >
          @error('m')
            <p class="errorForm">{{ $message }}</p>
          @enderror
        </div>

        <div class="hidden tallesPorLetra col-4 col-md-2 form-group">
          <label for="">L: </label>
          <input class="cantidad form-control" type="number" name="l" min="0" max="100" step="1" @if (old('l') !== null) value="{{ old('l') }}" @else value="0" @endif >
          @error('l')
            <p class="errorForm">{{ $message }}</p>
          @enderror
        </div>

        <div class="hidden tallesPorLetra col-4 col-md-2 form-group">
          <label for="">XL: </label>
          <input class="cantidad form-control" type="number" name="xl" min="0" max="100" step="1" @if (old('xl') !== null) value="{{ old('xl') }}" @else value="0" @endif >
          @error('xl')
            <p class="errorForm">{{ $message }}</p>
          @enderror
        </div>


        {{-- talles por numero (jeans, zapatillas, accesorios, etc..) --}}
        <div class="tallesPorNumero hidden col-4 col-md-2 offset-md-1 form-group">
          <label>30: </label>
          <input class="cantidad form-control" type="number" name="t30" min="0" max="100" step="1"  @if (old('t30') !== null) value="{{ old('t30') }}" @else value="0" @endif >
          @error('t30')
            <p class="errorForm">{{ $message }}</p>
          @enderror
        </div>

        <div class="tallesPorNumero hidden col-4 col-md-2 form-group">
          <label>32: </label>
          <input class="cantidad form-control" type="number" name="t32" min="0" max="100" step="1"  @if (old('t32') !== null) value="{{ old('t32') }}" @else value="0" @endif >
          @error('t32')
            <p class="errorForm">{{ $message }}</p>
          @enderror
        </div>

        <div class="tallesPorNumero hidden col-4 col-md-2 form-group">
          <label>34: </label>
          <input class="cantidad form-control" type="number" name="t34" min="0" max="100" step="1"  @if (old('t34') !== null) value="{{ old('t34') }}" @else value="0" @endif >
          @error('t34')
            <p class="errorForm">{{ $message }}</p>
          @enderror
        </div>

        <div class="tallesPorNumero hidden col-4 col-md-2 form-group">
          <label>36: </label>
          <input class="cantidad form-control" type="number" name="t36" min="0" max="100" step="1"  @if (old('t36') !== null) value="{{ old('t36') }}" @else value="0" @endif >
          @error('t36')
            <p class="errorForm">{{ $message }}</p>
          @enderror
        </div>

        <div class="tallesPorNumero hidden col-4 col-md-2 form-group">
          <label>38: </label>
          <input class="cantidad form-control" type="number" name="t38" min="0" max="100" step="1"  @if (old('t38') !== null) value="{{ old('t38') }}" @else value="0" @endif >
          @error('t38')
            <p class="errorForm">{{ $message }}</p>
          @enderror
        </div>

        <div class="tallesPorNumero hidden col-4 col-md-2 offset-md-1 form-group">
          <label>40: </label>
          <input class="cantidad form-control" type="number" name="t40" min="0" max="100" step="1"  @if (old('t40') !== null) value="{{ old('t40') }}" @else value="0" @endif >
          @error('t40')
            <p class="errorForm">{{ $message }}</p>
          @enderror
        </div>

        <div class="tallesPorNumero hidden col-4 col-md-2 form-group">
          <label>42: </label>
          <input class="cantidad form-control" type="number" name="t42" min="0" max="100" step="1"  @if (old('t42') !== null) value="{{ old('t42') }}" @else value="0" @endif >
          @error('t42')
            <p class="errorForm">{{ $message }}</p>
          @enderror
        </div>

        <div class="tallesPorNumero hidden col-4 col-md-2 form-group">
          <label>44: </label>
          <input class="cantidad form-control" type="number" name="t44" min="0" max="100" step="1"  @if (old('t44') !== null) value="{{ old('t44') }}" @else value="0" @endif >
          @error('t44')
            <p class="errorForm">{{ $message }}</p>
          @enderror
        </div>

        <div class="tallesPorNumero hidden col-4 col-md-2 form-group">
          <label>46: </label>
          <input class="cantidad form-control" type="number" name="t46" min="0" max="100" step="1"  @if (old('t46') !== null) value="{{ old('t46') }}" @else value="0" @endif >
          @error('t46')
            <p class="errorForm">{{ $message }}</p>
          @enderror
        </div>

        <div class="tallesPorNumero hidden col-4 col-md-2 form-group">
          <label>48: </label>
          <input class="cantidad form-control" type="number" name="t48" min="0" max="100" step="1"  @if (old('t48') !== null) value="{{ old('t48') }}" @else value="0" @endif >
          @error('t48')
            <p class="errorForm">{{ $message }}</p>
          @enderror
        </div>

      </div>

      <div class="row">

        <div class="col-lg-4 offset-lg-2 col-md-6 form-group">
          <label for="">Agregue la/s imagenes del producto:</label>
          <label for="file-upload" class="subir">
          <i class="fas fa-cloud-upload-alt"></i> Subir archivo
          </label>
          <br>
          {{-- para poder agregar varios archivos hay que colocar los [] en el name del file y el atributo multiple --}}
          <input type="file" id="file-upload" onchange='change()' style='display: none;' class="sin-archivo"  name="images[]" value="" multiple >
          <div id="info"></div>
          @error('images')
            <p class="errorForm">{{ $message }}</p>
          @enderror
          @error('images.*')
            <p class="errorForm">{{ $message }}</p>
          @enderror
          <small id="emailHelp" class="form-text text-muted">Extensiones: jpg, jpeg, png. Peso maximo 2MB</small><br>
          <button type="submit" class="btn btn-success" value="Add Product">Agregar producto</button>
          <br><br><small id="emailHelp" class="form-text text-muted">Los valores con un * son obligatorios.</small>
        </div>

      </div>
    </form>

  </div>
{{-- <script src="js/agregarProducto.js" charset="utf-8"></script> --}}
@endsection
