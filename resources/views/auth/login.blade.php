@extends('plantilla')
@section('titulo')
Login
@endsection
@section('css')
forms
@endsection
@section('main')
  <section class="form-container">
			<h1 class="titulo">Inicia Sesion</h1>
      <form class="access-form" method="POST" action="{{ route('login') }}">
        @csrf

        <div class="field-group">
  			  <label for="email">Email</label>
          <input id="email" type="email" class="form-control" placeholder="correo@dominio.com" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
          @error('email')
            <p class="errorForm">{{ $message }}</p>
          @enderror
        </div>

        <div class="field-group">
          <label for="email">Password</label>
            <input id="password" type="password" class="form-control" placeholder="**********" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
              @error('password')
                <p class="errorForm">{{ $message }}</p>
              @enderror
        </div>

        <div class="field-group remember-me">
          <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
          <label for="remember-me"><h6>Recordarme</h6></label>
        </div>

        <button type="submit" class="recu-email">Ingresar</button>

      </form>
      <h6>No tienes una cuenta? <a href="/register">Crear cuenta</a></h6>
      @if (Route::has('password.request'))
        <h6>Olvidaste tu password? <a href="{{ route('password.request') }}">Recuperar password</a></h6>
      @endif
  </section>

@endsection
