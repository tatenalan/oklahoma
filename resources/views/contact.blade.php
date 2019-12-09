@extends('plantilla')
@section('titulo')
Contact us
@endsection
@section('css')
contact
@endsection
@section('main')
  <div class="container">
      <h5 class="centrado titulo">Formulario de contacto</h5>
      <div class="row">
        <div class="col-12 col-md-8 offset-md-2 col-lg-8 offset-lg-2">
          <form>
            <div class="form-group">
              <label for="exampleFormControlInput1">Nombre *</label>
              <input type="name" class="form-control" id="exampleFormControlInput1" placeholder="Ingrese su nombre" required>
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Email *</label>
              <input type="adress" class="form-control" id="exampleFormControlInput1" placeholder="Ingrese su correo" required>
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Celular</label>
              <input type="phone" class="form-control" id="exampleFormControlInput1" placeholder="Ingrese su numero">
            </div>
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Consulta</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="form-group">
              <button type="button" class="btn btn-success">Enviar Consulta</button>
            </div>
            Los valores con un * son obligatorios
          </form>
        </div>
      </div>
    </div>
@endsection
