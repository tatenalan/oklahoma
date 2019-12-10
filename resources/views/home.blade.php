@extends('plantilla')
@section('titulo')
  Home Page
@endsection
@section('css')
home
@endsection
@section('main')
  <!-- contenido especifico del body de la vista-->
      <section class="banner">
        <div class="banner-inicio">
          <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
              <!-- indicators
             <ol class="carousel-indicators">
                 <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                 <li data-target="#myCarousel" data-slide-to="1"></li>
                 <li data-target="#myCarousel" data-slide-to="2"></li> -->
             </ol>
             <div class="carousel-inner">
               <div class="carousel-item active">
                 <img src="/img/banner.png" class="d-block w-100" alt="...">
               </div>
               <div class="carousel-item">
                 <img src="/img/carrousel2prueba.jpg" class="d-block w-100" alt="...">
               </div>
               <div class="carousel-item">
                 <img src="/img/carrousel3prueba.jpg" class="d-block w-100" alt="...">
               </div>
             </div>
             <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
               <span class="carousel-control-prev-icon" aria-hidden="true"></span>
               <span class="sr-only">Previous</span>
             </a>
             <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
               <span class="carousel-control-next-icon" aria-hidden="true"></span>
               <span class="sr-only">Next</span>
             </a>
           </div>
           <a class="ordena-ahora" href="">ORDENA YA!</a>
        </div>
        <div class="banner-mobile">
          <img class="img-bannerMobile" src="/img/bannerMobile.png" alt="Banner">
        </div>
      </section>
      <div class="container">
        <section class="productos">
          <div class="row">
            @php
            $i = 0;
            @endphp
          @foreach ($products as $product)
            <div class="padding  col-6 col-md-4 col-lg-3">
              <div class="producto">
                <a href="product/{{$product->id}}"><img class="img-productos"  src="/img/{{$images[$i]->path}}" alt=<?= $product['nombre']?>></a>
                <h3><?= $product['tipo']?></h3>
                <p class="descripcion">{{$product->name}}</p>
                @if($product->onSale==true && isset($product->discount))
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
              </div>
            </div>
            @php
            if ($i<count($products)-1) {
              $i++;
            }
            else {
              $i = 1;
            }
            @endphp
          @endforeach
          </div>
        </section>
      </div>

  {{-- @foreach ($productos as $product)
  <div class="producto" style="margin-top: 70px; margin-left:50px;">
    <p>{{$product->name}}</p>
    <img style="height:200px;"src="/storage/{{$product->poster}}" alt="">
    <p>
    {{$product->price}}
    </p>
  </div>
  @endforeach --}}
@endsection('main')
