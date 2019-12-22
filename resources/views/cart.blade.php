@extends('plantilla')
@section('titulo')
Cart
@endsection
@section('css')
cart
@endsection



@section('main')

  {{-- Defino variables (estas deberian estar en el controlador??) --}}
  @php
  $i = 0;
  $noHayStock=[];
  $valor= 0;
  @endphp
<div class="container">
  <h5 class="centrado titulo">Carrito de compras</h5>

  <div class="productos">
  {{-- Cada producto que se agregue va a ser un carrito nuevo, en este array los recorremos y pedimos sus datos --}}
  @forelse ($carts as $cart)
    @php
      // Estas variables corresponden al $cart por ende se definen dentro del foreach
      $size = $cart->size;
    @endphp


    <div class="producto">
      <div class="img">
        {{-- Como imagen del producto en el carrito utilizo la primera --}}
        <img src="/storage/{{$cart->product->images[0]->path}}" alt="">
      </div>
      <div class="product-info">
        {{-- <p class="label centrado">Nombre</p> --}}
        <p class="centrado">{{$cart->product->name}}</p>
        {{-- <p class="label centrado">Categoria: </p> --}}
        <p class="centrado">{{$cart->product->category->name}}</p>
        {{-- <p class="label centrado">Genero</p> --}}
        <p class="centrado">{{$cart->product->genre->name}}</p>
        {{-- <p class="label centrado">Talle</p> --}}
        <p class="centrado">{{$cart->size}}</p>
        {{-- <p class="label centrado">Cantidad</p> --}}
        <p class="centrado">{{$cart->quantity}} </p>
        {{-- Si en el carrito hay mas de un item voy a mostrar el precio y el total (total = precio por cantidad) --}}
        @if ($cart->quantity>1)
          <p class="centrado">Precio: ${{$cart->product->price}}</p>
          <p class="centrado">Total: ${{$cart->product->price * $cart->quantity}}</p>
        @else
          {{-- Si solo hay 1 producto muestro solamente el total --}}
          <p class="centrado">Total: ${{$cart->product->price * $cart->quantity}}</p>
        @endif
      </div>

      {{-- Si la cantidad elegida por el usuario del producto es mayor al stock del producto elegido en ese talle mostramos un mensaje de aviso de que no hay suficiente stock --}}
      @if ($cart->quantity > $cart->product->stock->$size)
        @php
          $noHayStock[]=true;
        @endphp
        <p>Precio: $ {{$cart->product->price}}</p>
        <p>No hay suficientes unidades disponibles</p>
      @endif

      @php
        $totalFinal[] = $cart->product->price * $cart->quantity
      @endphp

      {{-- Para cada producto agregado al carrito tenemos un boton eliminar que busca su id y lo elimina por post --}}
      <form class="" action="/deleteCart" method="post">
        @csrf
        <input class="producto_id" hidden type="text" name="cart_id" value="{{$cart->id}}">
        <button class='' type="submit">Sacar del Carrito</button>
      </form>
    </div> {{-- producto --}}


  {{-- si no hay productos en el carrito --}}
  @empty

      <h2 class="centrado">Tu Carrito está vacío</h2>
      <i class="centrado fas fa-shopping-basket"></i>

  @endforelse
  </div> {{-- productos --}}


  {{-- Si hay productos en el carrito --}}
  @if ($carts->count())

    @php
      $total = 0;
    @endphp

    {{-- Calculamos el total de la compra sumando el precio total de cada producto (precio por cantidad) --}}
    @foreach ($carts as $cart)
      @php
        $total = $total + $cart->product->price * $cart->quantity;
      @endphp
    @endforeach

    <div class="linea-separadora">

    </div>

    <div class="total">
      <p>Total de la compra: $ {{$total}}</p>

      {{-- Creamos un boton de compra que recolecta los id de los carritos del usuario --}}
      <form action="/buy" method="post">
        @csrf

        {{-- Foreach para recorrer cada carrito y obtener su id--}}
        @foreach ($carts as $cart)
          {{-- Por cada carrito creamos un input hidden que va a tener como valor el id del carrito --}}
          {{-- RECORDAR LOS CORCHETES EN EL NAME PARA QUE SE ENVIE COMO ARRAY --}}
          <input type="text" hidden name="id[]" value="{{$cart->id}}">
        @endforeach


        {{-- Foreach para que nos muestre un mensaje cuando no hay stock de algun producto y no nos deje comprar  --}}
        {{-- noHayStock es un array booleano que se fija si hay stock de cada producto --}}
        @foreach ($noHayStock as $producto)
          @php
            $valor = $producto;
          @endphp
          {{-- Frenamos el ciclo cuando encuentre un producto que no tenga stock --}}
          @break($producto==true)
        @endforeach

        {{-- Si no hay stock muestro el siguiente texto y hago un boton inutil --}}
        @if ($valor)
          <p style="color:red;">No se puede realizar la compra</p>
        @else
          <button type="submit">Comprar</button>
        @endif

      </form>
    </div>
  </div>
  @endif
@endsection
