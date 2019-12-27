@extends('layouts/plantilla')
@section('titulo')
Login
@endsection
@section('css')
forms
@endsection
@section('main')
  @if (session('status'))
      <div class="alert alert-success" role="alert">
          {{ session('status') }}
      </div>
  @endif
  <section class="form-container">
    <form class="access-form" method="POST" action="{{ route('password.email') }}">
      @csrf
      <div class="field-group">
        <label for="email">Escribe tu email</label>
        <input id="email" type="email"  placeholder="correo@dominio.com" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

          @error('email')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
      </div>

          <button type="submit" class="btn btn-success">
              Reset Password
          </button>
    </form>
  </section>
@endsection
