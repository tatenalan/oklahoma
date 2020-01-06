@extends('plantilla')
@section('titulo')
Accesorios
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
            <a href="/product/{{$product->id}}"><img style="" class="img-productos" onmouseover="this.src='/storage/{{$product->images[1]->path}}',this.style='transform: scale(1.03)';" onmouseout="this.src='/storage/{{$product->images[0]->path}}',this.style='transform: scale(1)';" src="/storage/{{$product->images[0]->path}}" alt="{{$product->category->name}}"></a>
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
              <p class="precio">${{$product->price}}</p>
            @endif
            <a class="ordenar" href="#">Ordenar!  <ion-icon name="cart"></ion-icon></a>
            @if (Auth::user())
              @if (Auth::user()->isAdmin == true)
                <a class="ordenar" href="/editproduct/{{$product->id}}">Editar</a>
              @endif
            @endif
          </div>
        </div>
        @endforeach
      </div>
    </section>
  </div>
@endsection
