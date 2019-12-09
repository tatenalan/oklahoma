@extends('plantilla')
@section('titulo')
Product
@endsection
@section('css')
product
@endsection
@section('main')
  <div class="container">
        <section class="producto">
          <div class="row">
            <div class="col-sm">
              <div class="">
              @empty(!$image->all())
                <img class="imagen-producto" src="/storage/{{$image->first()->path}}" alt="">
              @endempty
                @if ($product->onSale==true && isset($product->discount))
                    <span class="descuento"> {{$product->discount}} % off</span> <!-- Pone un cartelito de descuento sobre la imagen del producto-->
                @endif
              </div>
            <div class="carrousel-img">
              <div class="">
                <img class="imagen-producto-peque" src='/img/buzo2a.jpg' alt="">
              </div>
              <div class="">
                <img class="imagen-producto-peque" src='/img/buzo2b.jpg' alt="">
              </div>
              <div class="">
                <img class="imagen-producto-peque" src='/img/buzo2a.jpg' alt="">
              </div>
              <div class="">
                <img class="imagen-producto-peque" src='/img/buzo2b.jpg' alt="">
              </div>
            </div>
          </div>
            <div class="col-sm">
              <div class="filaUno">
                <h3 class=""> {{$product->name}} </h3>
                <h6 class="disponibilidad">EN STOCK</h6>
              </div>
              <div class="filaDos">
                <h3 class="tipo"> {{$product->category->name}} </h3>
                <!-- <h4>$<?= $product->price ?></h4> -->
                @if ($product->onSale==true && isset($product->discount))
                  @php
                    $onSalePrice = $product->price - $product->price/100*$product->discount; // precio * descuento / 100
                  @endphp
                  <span class="precioAnterior">${{$product->price}}</span> <!-- Muestra precio anterior tachado -->
                  <span class="precio">${{$onSalePrice}}</span><p></p> <!-- Muestra el precio con el descuento incluido -->
                @else
                  <p class="precio">${{$product->price}}</p>
                @endif
                <h6>3 o 6 cuotas sin interes con AMEX</h6>
              </div>
              <div class="filaTres">
                <form class="ordenar" action="/action_page.php">
                  <label for="">Talle:</label>
                  <select class="talles" name="talles">
                    <option value="XS">XS</option>
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                  </select>
                    <p>Cantidad:</p>
                  <input class="cantidad" type="number" name="quantity" min="1" max="100" step="1" value="1">
                </form>
                <div class="filaSiete">
                <button type="button" name="button"><h2>Ordenar!</h2></button>
                </div>
              </div>
              <div class="filaCinco">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamcou fugiat nulla pariatur. Excepteur sint</p>
              </div>
              <div class="filaSeis">
                <p>detalles del producto: </p>
                <li>Agregar a favoritos LOGO</li>
              </div>
              <div class="filaCuatro">
                <ul class="compartirEnRedes">
                  <li><ion-icon class="rounded-circle border" name="logo-facebook"></li>
                  <li><ion-icon class="rounded-circle border" name="logo-twitter"></li>
                  <li><ion-icon class="rounded-circle border" name="logo-instagram"></a></li>
                </ul>
              </div>
            </div>
          </div>
        </section>
      </div>
      <div class="container">
        <section class="productos">
          <h3>Productos Relacionados</h3>
          <div class="carrousel-img">
            <div class="">
              <img class="productos-relacionados" src='/img/buzo8a.jpg' alt="">
            </div>
            <div class="">
              <img class="productos-relacionados" src='/img/buzo9a.jpg' alt="">
            </div>
            <div class="">
              <img class="productos-relacionados" src='/img/buzo5a.jpg' alt="">
            </div>
            <div class="">
              <img class="productos-relacionados" src='/img/buzo7a.jpg' alt="">
            </div>
          </div>
      </section>
      </div>
@endsection
