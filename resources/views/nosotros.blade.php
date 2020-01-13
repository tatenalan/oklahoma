@extends('plantilla')
@section('titulo')
Nosotros
@endsection
@section('css')
nosotros
@endsection
@section('main')
  <div class="container">
  {{-- abre el documento en otra ventana en blanco y te da la posibilidad de descargarlo --}}
    {{-- <a href="/img/documento.pdf" target="_blank">Abrir archivo</a> --}}
  {{-- te permite descargarlo clickeando el link directamente, el atributo download establece el nombre del archivo --}}
    {{-- <a href="/img/documento.pdf" download=documento >Descargar Archivo</a> --}}
    <h1>Nosotros!</h1>
    <i class="far fa-smile-wink"></i>
  </div>
      <div class="mapa">
        <h2 class="centrado">Visitanos!</h2>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11044.348169720275!2d-58.39139710401919!3d-34.6166928045939!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb791570f7236c962!2sDigital%20House!5e0!3m2!1ses-419!2sar!4v1572032597035!5m2!1ses-419!2sar" width="100%" height="300" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
      </div>
@endsection('main')
