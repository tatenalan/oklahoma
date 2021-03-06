@extends('plantilla')
@section('titulo')
  Home Page
@endsection
@section('css')
home
@endsection
@section('main')
<a id="top"></a>
      <div class="pimg1">
        <div class="ptext">
          <span class="texto-parallax">Oklahoma</span>
        </div>
      </div>
      <section class="section section-light">
        <h2>Nuevo en tienda</h2>
        <p>
          Commodi, vitae. Minima soluta tempt optio aliquam et, dolorem a cupiditate nihil fuga laboriosam fugiat placeat dignissimos! Unde eveniet placeat quisquam blanditiis ore ex, omnis!
        </p>
      </section>
      <div class="pimg2">
        <div class="ptext">
          <div class="twoLabels">
            <span class="texto-parallax wide">HOMBRE</span>
            <span class="texto-parallax wide">MUJER</span>
          </div>
        </div>
      </div>
      <section class="section section-light">
        <h2>Tendencias</h2>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt, laudantium, quibusdam? Nobis, delectus, commodi, fugit amet tempor
      </section>
      <div class="pimg3">
        <div class="ptext2">
          <span class="texto-parallax"><a href="/ofertas">Ofertas</a></span>
        </div>
      </div>
      <section class="section section-light">
        <h2>En liquidacion</h2>
        <p>
          Lorem ipsum dolor sit amet, co provident dolorem modi cumque illo enim quuisquam quasi cum
      </section>
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

          @foreach ($products as $product)
            <div class="padding  col-6 col-md-4 col-lg-3">
              <div class="producto">
                @if (isset($product->images[1]->path))
                  <a href="/product/{{$product->id}}"><img style="" class="img-productos" onmouseover="this.src='/storage/{{$product->images[1]->path}}',this.style='transform: scale(1.03)';" onmouseout="this.src='/storage/{{$product->images[0]->path}}',this.style='transform: scale(1)';" src="/storage/{{$product->images[0]->path}}" alt="{{$product->category->name}}"></a>
                @else
                  <a href="/product/{{$product->id}}"><img style="" class="img-productos" src="/storage/{{$product->images[0]->path}}" alt="{{$product->category->name}}"></a>
                @endif
                <h3>{{$product->category->name}}</h3>
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
                <a class="ordenar" href="/product/{{$product->id}}">Ordenar!  <ion-icon name="cart"></ion-icon></a>
                @if (Auth::user())
                @if (Auth::user()->isAdmin == true)
                  <a class="ordenar" href="/editProduct/{{$product->id}}">Editar</a>
                @endif
              @endif
              </div>
            </div>

          @endforeach
          </div>
        </section>
        <a onclick="scrollToTop()" class="toTop" title="Go to top"><i class="fas fa-angle-double-up"></i></a>
      </div>

@endsection('main')

<?php // cambios en los hover de las c ?>
