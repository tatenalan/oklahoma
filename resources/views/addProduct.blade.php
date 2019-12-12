@extends('plantilla')
@section('titulo')
Add Product
@endsection
@section('css')
contact
@endsection
@section('main')
  <div class="container">
    <h5 class="centrado titulo">Agregar Producto</h5>
    <div class="row">
      <div class="col-lg-4 offset-lg-2 col-md-6">
        <form class="form-signup" method="post" enctype="multipart/form-data">
          {{csrf_field()}}

          <div class="form-group">
            <label for="">Name: </label>
            <input type="text" class="form-control" name="name" value="">
          </div>

          <div class="form-group">
            <label for="">Price: </label>
            <input type="number" class="form-control" name="price" value="">
          </div>

          <div class="form-group">
            <label for="">on sale? : </label>
            <select class="" name="onSale">
                <option value =0 >No esta en oferta</option>
                <option value =1 >Esta en oferta</option>
            </select>
          </div>

          <div class="form-group">
            <label for="">descuento: </label>
            <input class="cantidad" type="number" class="form-control" name="discount" min="15" max="80" step="5" value="15">
          </div>

          <div class="form-group">
            <label for="">Genero: </label>
            <select class="" name="genre_id">
              <option value="">Seleccione un genero</option>
              @foreach ($genres as $genre)
                <option value="{{$genre->id}}">{{$genre->name}}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <label for="">Categories: </label>
            <select class="" name="category_id">
              <option value="">Seleccione una categoria</option>
              @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <label for="">XS: </label>
            <input class="cantidad" type="number" class="form-control" name="xs" min="0" max="100" step="1" value="0">
          </div>

          <div class="form-group">
            <label for="">S: </label>
            <input class="cantidad" type="number" class="form-control" name="s" min="0" max="100" step="1" value="0">
          </div>

          <div class="form-group">
            <label for="">M: </label>
            <input class="cantidad" type="number" class="form-control" name="m" min="0" max="100" step="1" value="0">
          </div>

          <div class="form-group">
            <label for="">L: </label>
            <input class="cantidad" type="number" class="form-control" name="l" min="0" max="100" step="1" value="0">
          </div>

          <div class="form-group">
            <label for="">XL: </label>
            <input class="cantidad" type="number" class="form-control" name="xl" min="0" max="100" step="1" value="0">
          </div>

          <div class="form-group">
            <label for="">Agregue una imagen para el producto</label>
            <br>
            {{-- para poder agregar varios archivos hay que colocar los [] en el name del file y el atributo multiple --}}
            <input type="file" name="images[]" value="" multiple>
          </div>

          <div class="form-group">
            <button type="submit" class="btn btn-success" value="Add Product">Agregar producto</button>
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
