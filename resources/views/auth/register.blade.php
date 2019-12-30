@extends('layouts/plantilla')
@section('titulo')
Register
@endsection
@section('css')
forms
@endsection
@section('main')
  <div class="container">
    <h5 class="centrado titulo">Formulario de registro</h5>
    <div class="row">
      <div class="col-lg-4 offset-lg-2 col-md-6">
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" >
          @csrf
          <div class="form-group">
            <label>First Name: *</label>
            <input name="first_name" value="{{ old('first_name') }}" type="text" class="form-control" placeholder="Ingresa tu Nombre">
            <small id="nameText" class="form-text text-muted">Ejemplo: Pablo, Adrian, Juan Carlos.</small>
            @error('first_name')
              <p class="errorForm">{{ $message }}</p>
            @enderror
          </div>
      </div>

      <div class="col-lg-4 col-md-6">
          <div class="form-group">
            <label>Last Name: *</label>
            <input name="last_name" value="{{ old('last_name') }}" type="text" class="form-control" placeholder="Ingresa tu Apellido">
            <small id="surnameText" class="form-text text-muted">Ejemplo: Rodriguez, Gonzalez Pires.</small>
            @error('last_name')
              <p class="errorForm">{{ $message }}</p>
            @enderror
          </div>
      </div>

      <div class="col-lg-4 offset-lg-2 col-md-6">
        <div class="form-group">
            <label>Birth date: *</label>
            <input name="birth_date" value="{{ old('birth_date') }}" type="date" class="form-control" placeholder="Fecha de Nacimiento">
            <small class="form-text text-muted">Solo Campos numericos.</small>
            @error('birth_date')
              <p class="errorForm">{{ $message }}</p>
            @enderror
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
          <div class="form-group">
            <label>Email: *</label>
            <input name="email" value="{{ old('email') }}" type="text" class="form-control" placeholder="Ingresa tu Email">
            <small id="emailText" class="form-text text-muted">Formato: email@dominio.com</small>
            @error('email')
              <p class="errorForm">{{ $message }}</p>
            @enderror
          </div>
      </div>

      <div class="col-lg-4 offset-lg-2 col-md-6">
          <div class="form-group">
            <label>Password: *</label>
            <input name="password" value="" type="password" class="form-control" placeholder="Ingresa tu Password">
            <small id="passwordText" class="form-text text-muted">Debe contener al menos 6 caracteres</small>
            @error('password')
              <p class="errorForm">{{ $message }}</p>
            @enderror
          </div>
      </div>

      <div class="col-lg-4 col-md-6">
          <div class="form-group">
            <label>Confirm password: *</label>
            <input name="password_confirmation" value="" type="password" class="form-control" placeholder="Confirmar Password">
            <small id="confirmPasswordText" class="">Debe contener al menos 6 caracteres</small>
            @error('password-confirm')
              <p class="errorForm">{{ $message }}</p>
            @enderror
          </div>
      </div>

      <div class="col-lg-4 offset-lg-2 col-md-6">
          <div class="form-group">
            <label>Home address: </label>
            <input name="home_address" value="{{ old('home_address') }}" type="text" class="form-control" placeholder="Ingresa tu Direccion">
            <small class="form-text text-muted">Formato: email@dominio.com</small>
            @error('home_address')
              <p class="errorForm">{{ $message }}</p>
            @enderror
          </div>
      </div>

      <div class="col-lg-4 col-md-6">
          <div class="form-group">
          <label for="">Sube tu avatar: (opcional)</label><br>
          <label for="file-upload" class="subir">
          <i class="fas fa-cloud-upload-alt"></i> Subir archivo
          </label>
          <input type="file" id="file-upload" onchange='change()' style='display: none;' class="sin-archivo" name="avatar" value="" multiple>
          <div id="info"></div>
          <small id="emailHelp" class="form-text text-muted">Extensiones: jpg, jpeg, png. Peso maximo 2mb</small>
            @error('avatar')
              <p class="errorForm">{{ $message }}</p>
            @enderror
          </div>
      </div>

          <div class="col-lg-4 offset-lg-2 col-md-6">
            <div class="form-group form-check">
              <input value="TerminosAceptados" name="terms" type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Acepto los terminos y condiciones *</label>
              <br>
              <small id="terminosYCondiciones" hidden class="form-text text-muted">Para continuar acepte los terminos y condiciones</small>
              @error('terms')
                <p class="errorForm">{{ $message }}</p>
              @enderror
            </div>
            <div class="form-group form-check">
              <input value="Newsletter" name="Newsletter" type="checkbox" class="form-check-input" id="exampleCheck2">
              <label class="form-check-label" for="exampleCheck1">Ofertas, enterarme de todo</label>
            </div>
              <button type="submit" class="btn btn-success">Register</button>
              <br><br><small id="emailHelp" class="form-text text-muted">Los valores con un * son obligatorios.</small>
        </form>
    </div>
  </div>

  {{-- Lo que hace este script es tomar el nombre del archivo que queremos subir y ponerlo dentro el elemento con la clase info para que podamos verlo. --}}
    <script>function change(){
      var pdrs = document.getElementById('file-upload').files[0].name;
      document.getElementById('info').innerHTML = pdrs;
    }</script>
    <script src="js/validaciones.js" charset="utf-8"></script>

@endsection
