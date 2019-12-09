  <form class="" method="post" enctype="multipart/form-data">
        {{csrf_field()}}

        <label for="">Name: </label>
        <input type="text" name="name" value="">
        <br>

        <label for="">Price: </label>
        <input type="number" name="price" value="">
        <br>

        <label for="">on sale? : </label>
        <select class="" name="onSale">
          <option value =0 >No esta en oferta</option>
          <option value =1 >Esta en oferta</option>
        </select>
        <br>

        <label for="">descuento: </label>
        <input class="cantidad" type="number" name="discount" min="0" max="100" step="1" value="0">
        <br>

        <label for="">Genero: </label>
        <select class="" name="genre_id">
          <option value="">Seleccione un genero</option>
          @foreach ($genres as $genre)
            <option value="{{$genre->id}}">{{$genre->name}}</option>
          @endforeach
        </select>
        <br>

        <label for="">Categories: </label>
        <select class="" name="category_id">
          <option value="">Seleccione una categoria</option>
          @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
          @endforeach
        </select>
        <br>

        <label for="">XS: </label>
        <input class="cantidad" type="number" name="discount" min="0" max="100" step="1" value="0">

        <label for="">S: </label>
        <input class="cantidad" type="number" name="discount" min="0" max="100" step="1" value="0">

        <label for="">M: </label>
        <input class="cantidad" type="number" name="discount" min="0" max="100" step="1" value="0">

        <label for="">L: </label>
        <input class="cantidad" type="number" name="discount" min="0" max="100" step="1" value="0">

        <label for="">XL: </label>
        <input class="cantidad" type="number" name="discount" min="0" max="100" step="1" value="0">
        <br>

        <label for="">Agregue una imagen para el producto</label>
        <br>
        {{-- para poder agregar varios archivos hay que colocar los [] en el name del file y el atributo multiple --}}
        <input type="file" name="images[]" value="" multiple>

        <br>
        <button type="submit" name="button" value="Add Product">Agregar producto</button>
  </form>


    <ul style="color:red" class="errores">
      @foreach ($errors->all() as $error)
        <li>
          {{$error}}
        </li>
      @endforeach
    </ul>

    {{-- @php
      dd($_GET);
    @endphp --}}
