<form class="" action="/agregarProducto" method="post" enctype="multipart/form-data">
      {{csrf_field()}}
      <label for="">Name: </label>
      <input type="text" name="name" value="">
      <br>
      <label for="">Price: </label>
      <input type="number" name="price" value="">
      <br>
      <label for="">onSale: </label>
      <select class="" name="onSale">
        <option value="">choose one</option>
        <option value=0>No esta en oferta</option>
        <option value=1>Esta en oferta</option>
      </select>
      <br>
      <label for="">Descuento</label>
      <select class="" name="discount">
        <option value="">Sin descuento</option>
        <option value="15">15%</option>
        <option value="25">25%</option>
        <option value="40">40%</option>
      </select>
      <br>
      <label for="">Genero: </label>
      <select class="" name="genre_id">
        <option value=1>Male</option>
        <option value=2>Female</option>
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
      <label for="">Agregue una imagen para el producto</label>
      <br>
      <input type="file" name="poster" value="">
      <br>
      <button type="submit" name="button">Agregar producto</button>
    </form>
    <ul style="color:red" class="errores">
      @foreach ($errors->all() as $error)
        <li>
          {{$error}}
        </li>
      @endforeach
    </ul>
