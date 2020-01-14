@extends('plantilla')
@section('titulo')
Contact us
@endsection
@section('css')
forms
@endsection
@section('main')
  <div class="container">
      <h5 class="centrado titulo">Formulario de contacto</h5>
      <div class="row">
        <div class="col-12 col-md-8 offset-md-2 col-lg-8 offset-lg-2">
          <form method="POST" action="https://docs.google.com/forms/u/0/d/e/1FAIpQLSfn6YfzOHuTGOlwSK3Bo9KG4P9mO6h93fO66-eebp0ZFEDS_Q/formResponse" target="_blank" id="mG61Hd">
            <div class="form-group">
              <label>Nombre completo *</label>
              <input type="text" class="form-control" id="fullname" name="entry.2005620554" placeholder="Ingrese su nombre" required>
            </div>
            <div class="form-group">
              <label>Email *</label>
              <input type="email" class="form-control" id="youremail" name="entry.947126918" placeholder="Ingrese su correo" required>
              <small id="emailText" class="form-text text-muted">Formato: email@dominio.com</small>
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Numero telefonico</label>
              <input type="number" class="form-control" id="mobilenumber" name='entry.1166974658' placeholder="Ingrese su numero">
            </div>
            <div class="form-group">
              <label>Consulta *</label>
              <textarea class="form-control" id="yourquery" name="entry.839337160" rows="3" required></textarea>
            </div>
            <div class="form-group">
              <button type="submit" name="submit" value="submit" id="submit" class="btn btn-success">Enviar Consulta</button>
            </div>
            Los valores con un * son obligatorios
          </form>
        </div>
      </div>
    </div>
@endsection
