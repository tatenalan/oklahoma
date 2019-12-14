<li>{{$product->name}}</li>
@if ($product->onSale==true && isset($product->discount))
  @php
    $onSalePrice = $product->price - $product->price/100*$product->discount; // precio * descuento / 100
  @endphp
  <span class="precioAnterior">${{$product->price}}</span> <!-- Muestra precio anterior tachado -->
  <span class="precio">${{$onSalePrice}}</span><p></p> <!-- Muestra el precio con el descuento incluido -->
@else
  <p class="precio">${{$product->price}}</p>
@endif
<li>{{$product->category->name}}</li>
<li><img height="200px" src="/storage/{{$product->images[0]->path}}" alt=""></li>
<li>Cantidad: {{$quantity}}</li>
<li>Talle: {{$size}}</li>
<br>


<h3>Total:</h3>
