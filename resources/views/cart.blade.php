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
  @php
    $i = 0;
    $noHayStock=[];
  @endphp
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

      @php
      $size = $cart->size;
      @endphp

      @if ($cart->quantity > $cart->products->stock->$size)
        @php
          $noHayStock[]=true;
        @endphp
        <p>Precio: $ {{$cart->products->price}}</p>
        <p>No hay suficientes unidades disponibles</p>
      @endif

      @php
        $totalFinal[] = $cart->products->price * $cart->quantity
      @endphp

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

    @foreach ($carts as $cart)
      @php
        $total = $total + $cart->products->price * $cart->quantity;
      @endphp
    @endforeach

    <div class="">
      <p>Total de la compra: $ {{$total}}</p>

      {{-- Creamos un boton de compra que recolecta los id de los carritos del usuario --}}
      <form action="/buy" method="post">
        @csrf
        {{-- Foreach para recorrer cada carrito --}}
        @foreach ($carts as $cart)
          {{-- Por cada carrito creamos un input hidden que va a tener como valor el id del carrito --}}
          {{-- RECORDAR LOS CORCHETES EN EL NAME PARA QUE SE ENVIE COMO ARRAY --}}
          <input type="text" hidden name="id[]" value="{{$cart->id}}">
        @endforeach
        @foreach ($noHayStock as $value)
          @php
            $valore= $value;
          @endphp
          @break($value==true)
        @endforeach
        @if ($valore)
          <p style="color:red;">No se puede realizar la compra</p>
        @else
          <button type="submit">Comprar</button>
        @endif

      </form>
    </div>
  @endif
@endsection
