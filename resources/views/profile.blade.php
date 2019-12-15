@extends('plantilla')
@section('titulo')
Profile
@endsection('titulo')
@section('css')
profile
@endsection('css')
@section('main')
  <div class="container">
    <h3>Bienvenido {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h3>
    <li>Tu email es: {{ Auth::user()->email }}</li>
    <li><img class="avatar" src="/storage/{{Auth::user()->avatar}}" alt=""></li>
    <a href="/edituser/{{Auth::user()->id}}">Editar Perfil</a>
  </div>
@endsection('main')
