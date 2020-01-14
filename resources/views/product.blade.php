@extends('plantilla')
@section('titulo')
Product
@endsection
@section('css')
product
@endsection
@section('main')
  @php
  //dd($product->stock->XL);
  // problema puntual, al acceder a los valores de talle numericos aparece un error
  // $product->stock->28
  @endphp
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

            <img class="imagen-producto-peque"src="/storage/{{$image->path}}" alt="">
          </div>
          @endforeach
          </div>
        </div>
        <div class="col-sm">
          <div class="filaUno">
            <h3 class=""> {{$product->name}} </h3>
            <div class="enstock">
              <h6 class="disponibilidad">EN STOCK</h6>
            </div>
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
              {{-- Si el producto es id = jeans, entonces muestro talles numericos --}}
              <select class="talles" name="size">
                @if ($product->category_id==3)
                  <option value="26">26 @if ($product->stock->T26==0)No hay stock!@elseif ($product->stock->T26<=3) Quedan pocos! @endif</option>
                  <option value="28">28 @if ($product->stock->T28==0)No hay stock!@elseif ($product->stock->T26<=3) Quedan pocos! @endif</option>
                  <option value="30">30 @if ($product->stock->T30==0)No hay stock!@elseif ($product->stock->T30<=3) Quedan pocos! @endif</option>
                  <option value="32">32 @if ($product->stock->T32==0)No hay stock!@elseif ($product->stock->T32<=3) Quedan pocos! @endif</option>
                  <option value="34">34 @if ($product->stock->T34==0)No hay stock!@elseif ($product->stock->T34<=3) Quedan pocos! @endif</option>
                  <option value="36">36 @if ($product->stock->T36==0)No hay stock!@elseif ($product->stock->T36<=3) Quedan pocos! @endif</option>
                  <option value="38">38 @if ($product->stock->T38==0)No hay stock!@elseif ($product->stock->T38<=3) Quedan pocos! @endif</option>
                  <option value="40">40 @if ($product->stock->T40==0)No hay stock!@elseif ($product->stock->T40<=3) Quedan pocos! @endif</option>
                  <option value="42">42 @if ($product->stock->T42==0)No hay stock!@elseif ($product->stock->T42<=3) Quedan pocos! @endif</option>
                  <option value="44">44 @if ($product->stock->T44==0)No hay stock!@elseif ($product->stock->T44<=3) Quedan pocos! @endif</option>
                  <option value="46">46 @if ($product->stock->T46==0)No hay stock!@elseif ($product->stock->T46<=3) Quedan pocos! @endif</option>
                  <option value="48">48 @if ($product->stock->T48==0)No hay stock!@elseif ($product->stock->T48<=3) Quedan pocos! @endif</option>
                  <option value="50">50 @if ($product->stock->T50==0)No hay stock!@elseif ($product->stock->T50<=3) Quedan pocos! @endif</option>
                @endif


                @if ($product->category_id!=3) {{-- si el stock en la BD no es null --}}
                  <option value="XS">XS @if ($product->stock->XS==0) No hay stock!@elseif ($product->stock->XS<=3) Quedan pocos! @endif</option>
                  <option value="S">S @if ($product->stock->S==0) No hay stock!@elseif ($product->stock->S<=3) Quedan pocos! @endif</option>
                  <option value="M">M @if ($product->stock->M==0) No hay stock!@elseif ($product->stock->M<=3) Quedan pocos! @endif</option>
                  <option value="L">L @if ($product->stock->L==0) No hay stock!@elseif ($product->stock->L<=3) Quedan pocos! @endif</option>
                  <option value="XL">XL @if ($product->stock->XL==0) No hay stock!@elseif ($product->stock->XL<=3) Quedan pocos! @endif</option>
                @endif
              </select>

                <p>Cantidad:</p>
              <input class="cantidad" type="number" name="quantity" min="1" max="100" step="1" value="1">
              <input type="number" hidden name="id" value="{{$product->id}}">
      </div>
      <div class="row">
        <div class="col-sm">
          <div class="filaSiete">
            <button type="submit" class="ordenar btn btn-success botonOrdenar">Ordenar</button>
          </div>
        </div>
            </form>

        @if (Auth::user() && Auth::user()->isAdmin == true)

          <div class="filaSiete">
            <form class="" onclick="confirmar()" action="/delete/product/{{$product->id}}" method="post">
              @csrf
              <button type="submit" class="ordenar btn btn-danger eliminar">Eliminar producto</button>
            </form>
            <form class="" action="/editProduct/{{$product->id}}" method="get">
              @csrf
              <button type="submit" class="ordenar btn btn-info eliminar">Editar producto</button>
            </form>
          </div>
        @endif
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
      <script src="/js/productoDinamico.js" charset="utf-8"></script>
@endsection
