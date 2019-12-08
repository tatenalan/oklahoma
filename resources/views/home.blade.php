@extends('plantilla')
@section('titulo')
  Home Page
@endsection
@section('css')
  <!-- css especifico del la vista -->
@endsection
@section('principal')
  <!-- contenido especifico del body de la vista-->
  ESTA ES NUESTRA PAGINA WEB
  <a href="#">Comprar cerveza artesanal</a>

  @foreach ($productos as $product)
  <div class="producto" style="margin-top: 70px; margin-left:50px;">
    <p>{{$product->name}}</p>
    <img style="height:200px;"src="/storage/{{$product->poster}}" alt="">
    <p>
    {{$product->price}}
    </p>
  </div>
  @endforeach
  @endsection
