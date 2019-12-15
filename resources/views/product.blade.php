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
                {{-- <img class="imagen-producto" src="/img/{{$image->first()->path}}" alt=""> para factories --}}
                <img id="imagenGran"class="imagen-producto" src="/storage/{{$product->images[0]->path}}" alt="">
              @endempty
                @if ($product->onSale==true && isset($product->discount))
                    <span class="descuento"> {{$product->discount}} % off</span> <!-- Pone un cartelito de descuento sobre la imagen del producto-->
                @endif
              </div>
              <div class="carrousel-img">
              @foreach ($product->images as $image)
              <div class="imagenesChiquiten">
                <img class="imagen-producto-peque" onclick="changeImage(), this.style.border = '3px solid #18BC9C' , this.style.opacity=0.7"src="/storage/{{$image->path}}" alt="">
              </div>
              @endforeach
              </div>
            </div>
            <div class="col-sm">
              <div class="filaUno">
                <h3 class=""> {{$product->name}} </h3>
                <h6 class="disponibilidad">EN STOCK</h6>
              </div>
              <div class="filaDos">
                <h3 class="tipo"> {{$product->category->name}} </h3>
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
                <form action="/addToCart" class="ordenar" method="post">
                  @csrf
                  <label for="">Talle:</label>
                  <select class="talles" name="size">
                    <option value="XS">XS</option>
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                  </select>
                    <p>Cantidad:</p>
                  <input class="cantidad" type="number" name="quantity" min="1" max="100" step="1" value="1">
                  <input type="number" hidden name="id" value="{{$product->id}}">
                  <div class="filaSiete">
                    <button type="submit" class="ordenar btn btn-success">Ordenar</button>
                  </div>
                </form>
              </div>
              <div class="filaCinco">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamcou fugiat nulla pariatur. Excepteur sint</p>
              </div>
              <div class="filaCuatro">
                <ul class="compartirEnRedes">
                  <li><ion-icon class="rounded-circle border" name="logo-facebook"></li>
                    <li><ion-icon class="rounded-circle border" name="logo-twitter"></li>
                      <li><ion-icon class="rounded-circle border" name="logo-instagram"></a></li>
                      </ul>
                    </div>
              <div class="filaSeis">
                <ul>
                  <h6 class="centrado">Agregar a favoritos <i class="far fa-heart"></i></h6>
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
      <script type="text/javascript">
        function changeImage(){
          var imagenGrande = document.querySelector('.imagen-producto');
          var fotosChicas = document.querySelectorAll(".imagen-producto-peque");
          for (img of fotosChicas) {
            addEventListener('click',e=>(imagenGrande.src = e.target.src));
          }
          for (fotos of fotosChicas) {
            fotos.style.border = 'none';
            fotos.style.opacity = 1;
          }
          console.log(imagenGrande.src);
          var imgs = fotosChicas;
        }
      </script>
@endsection
