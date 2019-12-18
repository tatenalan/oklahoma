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
        <form class="form-signup" method="post" enctype="multipart/form-data">
          @csrf

          <div class="row">
            <div class="col-8 col-lg-4 offset-lg-2 col-md-6 form-group">
              <label for="">Nombre: *</label>
              <input type="text" placeholder="Ingrese un nombre" class="form-control" name="name" value="{{ old('name') }}">
              @error('name')
                <p class="errorForm">{{ $message }}</p>
              @enderror
            </div>

            <div class="col-4 col-lg-4 col-md-6 form-group">
              <label for="">Precio: *</label>
              <input type="number" class="cantidad form-control" min="0" max="50000" step="100" name="price" value="0">
                @error('price')
                  <p class="errorForm">{{ $message }}</p>
                @enderror
            </div>
          </div>

          <div class="row">
            <div class="col-6 col-lg-4 offset-lg-2 col-md-6 form-group">
              <label for="">En oferta? : </label>
              <select class="form-control" name="onSale">
                  <option value =0 >No esta en oferta</option>
                  <option value =1 >Esta en oferta</option>
              </select>
            </div>

            <div class="col-6 col-lg-4 col-md-6 form-group">
              <label for="">Descuento: </label>
              <input class="cantidad form-control" type="number" name="discount" max="80" step="5" value="0">
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
              <select class="form-control" name="category_id">
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

          <div class="row">

            <div class="col-4 col-md-2 offset-md-1 form-group">
              <label for="">XS: </label>
              <input class="cantidad form-control" type="number" name="xs" min="0" max="100" step="1" value="0">
              @error('xs')
                <p class="errorForm">{{ $message }}</p>
              @enderror
            </div>

            <div class="col-4 col-md-2 form-group">
              <label for="">S: </label>
              <input class="cantidad form-control" type="number" name="s" min="0" max="100" step="1" value="0">
              @error('s')
                <p class="errorForm">{{ $message }}</p>
              @enderror
            </div>

            <div class="col-4 col-md-2 form-group">
              <label for="">M: </label>
              <input class="cantidad form-control" type="number" name="m" min="0" max="100" step="1" value="0">
              @error('m')
                <p class="errorForm">{{ $message }}</p>
              @enderror
            </div>

            <div class="col-4 col-md-2 form-group">
              <label for="">L: </label>
              <input class="cantidad form-control" type="number" name="l" min="0" max="100" step="1" value="0">
              @error('l')
                <p class="errorForm">{{ $message }}</p>
              @enderror
            </div>

            <div class="col-4 col-md-2 form-group">
              <label for="">XL: </label>
              <input class="cantidad form-control" type="number" name="xl" min="0" max="100" step="1" value="0">
              @error('xl')
                <p class="errorForm">{{ $message }}</p>
              @enderror
            </div>

          </div>

          <div class="row">

            <div class="col-lg-4 offset-lg-2 col-md-6 form-group">
              <label for="">Agregue las imagenes del producto (2 minimo):</label>
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

{{-- Lo que hace este script es tomar el nombre del archivo que queremos subir y ponerlo dentro el elemento con la clase info para que podamos verlo. --}}
  <script>function change(){
    var pdrs = document.getElementById('file-upload').files[0].name;
    document.getElementById('info').innerHTML = pdrs;
  }</script>

@endsection
