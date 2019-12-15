@extends('plantilla')
@section('titulo')
Edit Profile
@endsection('titulo')
@section('css')
profile
@endsection('css')
@section('main')
  <div class="container">
    <form class="" action='/profile' method="post" enctype="multipart/form-data">
      @csrf
      @method('put')
      <label for="">First Name:</label>
      <input type="text" name="first_name" value="{{ Auth::user()->first_name }} ">
      @error('first_name')
        <div class="invalid-feedback">{{$message}}</div>
      @enderror

      <br>

      <label for="">Last Name:</label>
      <input type="text" name="last_name" value="{{ Auth::user()->last_name }}">
      @error('last_name')
        <div class="invalid-feedback">{{$message}}</div>
      @enderror

      <br>

      <label for="">Email:</label>
      <input type="text" name="email" value="{{ Auth::user()->email }}">
      @error('email')
        <div class="invalid-feedback">{{$message}}</div>
      @enderror

      <br>

      <label for="">Avatar:</label>
      <input type="file" name="poster" value="{{ old('avatar')}}">
      @error('avatar')
        <div class="invalid-feedback">{{$message}}</div>
      @enderror

      <br>

      @php
      $avatar_path = storage_path('app/public/') . Auth::user()->avatar; // traemos la variable con la ruta de la imagen
      @endphp

      {{-- Si el avatar existe tanto en la bd como en storage, la muestro --}}
      @if (Auth::user()->avatar && file_exists($avatar_path))
      <img class="avatar" src="/storage/{{Auth::user()->avatar}}" alt="">
      @endif

      <br>
      <input type="submit" name="" value="Edit">
    </form>
    <a href="/profile">Volver</a>
  </div>
@endsection('main')
