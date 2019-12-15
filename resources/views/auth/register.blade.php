@extends('plantilla')
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
            <small class="form-text text-muted">Ejemplo: Pablo, Adrian, Juan Carlos.</small>
            @error('first_name')
              <p class="errorForm">{{ $message }}</p>
            @enderror
          </div>
      </div>

      <div class="col-lg-4 col-md-6">
          <div class="form-group">
            <label>Last Name: *</label>
            <input name="last_name" value="{{ old('last_name') }}" type="text" class="form-control" placeholder="Ingresa tu Apellido">
            <small class="form-text text-muted">Ejemplo: Rodriguez, Gonzalez Pires.</small>
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
            <small class="form-text text-muted">Formato: email@dominio.com</small>
            @error('email')
              <p class="errorForm">{{ $message }}</p>
            @enderror
          </div>
      </div>

      <div class="col-lg-4 offset-lg-2 col-md-6">
          <div class="form-group">
            <label>Password: *</label>
            <input name="password" value="" type="password" class="form-control" placeholder="Ingresa tu password">
            <small class="form-text text-muted">Debe contener al menos 6 caracteres</small>
            @error('password')
              <p class="errorForm">{{ $message }}</p>
            @enderror
          </div>
      </div>

      <div class="col-lg-4 col-md-6">
          <div class="form-group">
            <label>Confirm password: *</label>
            <input name="password-confirm" value="" type="password" class="form-control" placeholder="Confirmar Password">
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
          <input class="sin-archivo" type="file" name="avatar" value=""><br>
          <small id="emailHelp" class="form-text text-muted">Extensiones: jpg, jpeg, png.</small>
            @error('avatar')
              <p class="errorForm">{{ $message }}</p>
            @enderror
          </div>
      </div>

          <div class="col-lg-4 offset-lg-2 col-md-6">
            <div class="form-group form-check">
              <input value="TerminosAceptados" name="terminos" type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Acepto los terminos y condiciones *</label>
              <p class="errorForm">
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
@endsection
