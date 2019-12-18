@extends('plantilla')
@section('titulo')
Cart
@endsection
@section('css')
forms
@endsection
@section('main')
<div class="container">
  <h5 class="centrado titulo">Carrito de compras</h5>
  @forelse ($carts as $cart)
    <div class="producto">
      <div class="">
        <img height="200px"src="/storage/{{$cart->products->images[0]->path}}" alt="">
      </div>
      <p>Nombre: {{$cart->products->name}}</p>
      <p>Categoria: {{$cart->products->category->name}}</p>
      <p>Genero: {{$cart->products->genre->name}}</p>
      <p>Talle: {{$cart->size}}</p>
      <p>Cantidad: {{$cart->quantity}} </p>
      @if ($cart->quantity>1)
        <p>Precio: ${{$cart->products->price}}</p>
        <p>Total: ${{$cart->products->price * $cart->quantity}}</p>
      @else
        <p>Total: ${{$cart->products->price * $cart->quantity}}</p>
      @endif
      <form class="" action="/deleteCart" method="post">
        @csrf
        <input class="producto_id" hidden type="text" name="cart_id" value="{{$cart->id}}">
        <button class='eliminar' type="submit">Sacar del Carrito</button>
      </form>
    </div>
  @empty

      <h2 class="centrado">Tu Carrito está vacío</h2>
      <i class="centrado fas fa-shopping-basket"></i>

  @endforelse
  @if ($carts->count())
    @php
      $total = 0;
    @endphp
    @foreach ($carts as $product)
      @php
        $total = $total + $cart->products->price * $product->quantity;
      @endphp
    @endforeach
    <div class="">
      <p>Total de la compra: $ {{$total}}</p>
      <form action="/buy" method="post">
        @csrf
        <button type="submit">Comprar</button>
      </form>
    </div>
  @endif
@endsection
