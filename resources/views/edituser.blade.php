@extends('plantilla')
@section('titulo')
Edit Profile
@endsection('titulo')
@section('css')
forms
@endsection('css')
@section('main')
  <div class="container">
    <h5 class="centrado titulo">Editar Perfil</h5>

        <!-- Vista de edicion del Usuario-->
    <form class="" action='/profile' method="post" enctype="multipart/form-data">
      @csrf
      @method('put')

      <div class="row">
        <div class="col-lg-4 offset-lg-2 col-md-6 form-group">
          <label for="">First Name: *</label>
          <input type="text" class="form-control" name="first_name" value="{{ Auth::user()->first_name }} ">
          @error('first_name')
            <p class="errorForm">{{ $message }}</p>
          @enderror
        </div>


          <br>

        <div class="col-lg-4 col-md-6 form-group">
          <label for="">Last Name: *</label>
          <input type="text" class="form-control" name="last_name" value="{{ Auth::user()->last_name }}">
          @error('last_name')
            <p class="errorForm">{{ $message }}</p>
          @enderror
        </div>
      </div>

      <br>

      <div class="row">
        <div class="col-lg-4 offset-lg-2 col-md-6 form-group">
          <label for="">Email: *</label>
          <input type="text" class="form-control" name="email" value="{{ Auth::user()->email }}">
          @error('email')
            <p class="errorForm">{{ $message }}</p>
          @enderror
        </div>

          <br>

        <div class="col-lg-4 col-md-6 form-group">
          <label for="">Password: </label>
          <input type="password" class="form-control" name="password" value="" placeholder="Ingresa tu nueva password">
          @error('password')
            <p class="errorForm">{{ $message }}</p>
          @enderror
        </div>
      </div>

      <br>

      <div class="row">
        <div class="col-sm col-lg-4 offset-lg-2">
          <label for="">Cambiar Avatar:</label>
          <label for="file-upload" class="subir"><i class="fas fa-cloud-upload-alt"></i> Subir archivo</label>
          <input type="file" id="file-upload" onchange='change()' style='display: none;' name="avatar" value="{{ old('avatar')}}">
          <div id="info"></div>
          @error('avatar')
            <p class="errorForm">{{ $message }}</p>
          @enderror
          <small id="emailHelp" class="form-text text-muted">Extensiones: jpg, jpeg, png.</small><br>

          <br>

          @php
          $avatar_path = storage_path('app/public/') . Auth::user()->avatar; // traemos la variable con la ruta de la imagen
          @endphp
        </div>
        <div class="col-sm col-lg-4">
          {{-- Si el avatar existe tanto en la bd como en storage, la muestro --}}
          @if (Auth::user()->avatar && file_exists($avatar_path))
            Avatar actual:
          <img class="avatar" src="/storage/{{Auth::user()->avatar}}" alt="">
          @endif
        </div>
      </div>

      <br>
      <div class="row">
        <div class="col-sm col-lg-4 offset-lg-2">
          <input type="submit" class="btn btn-info" name="" value="Editar Usuario">
        </div>
    </form>
    <form class="" action="/deleteUser" method="post">
      @csrf
      <div class="col-sm col-lg-4">
      <input type="submit" class="btn btn-danger" name="" value="Eliminar Usuario">
    </form>
      </div>
    <a href="/profile" class="centrado">Volver atras</a>
  </div>


  {{-- Lo que hace este script es tomar el nombre del archivo que queremos subir y ponerlo dentro el elemento con la clase info para que podamos verlo. --}}
    <script>function change(){
      var pdrs = document.getElementById('file-upload').files[0].name;
      document.getElementById('info').innerHTML = pdrs;
    }</script>

@endsection('main')
