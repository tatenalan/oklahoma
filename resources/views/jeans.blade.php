@extends('plantilla')
@section('titulo')
Jeans
@endsection
@section('css')
home
@endsection
@section('main')
  <div class="container">
          <section class="productos">
            <div class="row">
              @foreach ($products as $product)
              <div class="padding  col-6 col-md-4 col-lg-3">
                <div class="producto">
                  <a href="product/{{$product->id}}"><img class="img-productos"  src="/img/remera2a.jpg" alt="{{$product->name}}"></a>
                  <h3>{{$product->category->name}}</h3>
                  <p class="descripcion">{{$product->name}}</p>
                  @if ($product->onSale==true && isset($product->discount))
                    @php
                        $onSalePrice = $product->price - $product->price/100*$product->discount; // precio * descuento / 100
                    @endphp
                  <span class="descuento">{{$product->discount}}% off</span> <!-- Pone un cartelito de descuento sobre la imagen del producto-->
                  <span class="precioAnterior">${{$product->price}}</span> <!-- Muestra precio anterior tachado -->
                  <span class="precio">${{$onSalePrice}}</span><p></p> <!-- Muestra el precio con el descuento incluido -->
                  @else
                          <p class="precio">{{$product->price}}</p>
                  @endif
                  <a class="ordenar" href="#">Ordenar!  <ion-icon name="cart"></ion-icon></a>
                </div>
              </div>
              @endforeach
            </div>
          </section>
        </div>
@endsection
