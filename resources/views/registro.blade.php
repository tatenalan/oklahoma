@extends('plantilla')
@section('titulo')
Register
@endsection
@section('css')
contact
@endsection
@section('main')
  <div class="container">
        <h5 class="centrado titulo">Formulario de registro</h5>
        <div class="row">
          <div class="col-lg-4 offset-lg-2 col-md-6">
            <form class="form-signup"action="signup.php" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <label>Nombre: *</label>
                <input name="nombre" value="<?=$_POST['nombre'] ?? '' ?>" type="text" class="form-control" placeholder="Ingresa tu Nombre">
                <small class="form-text text-muted">Ejemplo: Pablo, Adrian, Juan Carlos.</small>
                <p class="errorForm">
              </div>
          </div>
          <div class="col-lg-4 col-md-6">
              <div class="form-group">
                <label for="exampleInputEmail1">Apellido: *</label>
                <input name="apellido" value="<?=$_POST['apellido'] ?? '' ?>" type="text" class="form-control" placeholder="Ingresa tu Apellido">
                <small class="form-text text-muted">Ejemplo: Rodriguez, Gonzalez Pires.</small>
              </div>
          </div>
          <div class="col-lg-4 offset-lg-2 col-md-6">
              <div class="form-group">
                <label>Fecha de Nacimiento: *</label>
                <input name="edad" value="<?=$_POST['edad'] ?? '' ?>" type="date" class="form-control" placeholder="Ingresa tu Edad">
                <small class="form-text text-muted">Solo Campos numericos.</small>

              </div>
          </div>
          <div class="col-lg-4 col-md-6">
              <div class="form-group">
                <label>Email address: *</label>
                <input name="email" value="<?=$_POST['email'] ?? '' ?>" type="email" class="form-control" aria-describedby="emailHelp" placeholder="Ingresa tu email">
                <small class="form-text text-muted">Formato: email@dominio.com</small>
                <p class="errorForm">
              </div>
          </div>
          <div class="col-lg-4 offset-lg-2 col-md-6">
              <div class="form-group">
                <label>Password: *</label>
                <input name="password" value="" type="password" class="form-control" placeholder="Password">
                <small class="form-text text-muted">Debe contener al menos 6 caracteres</small>
                <p class="errorForm">
              </div>
          </div>
          <div class="col-lg-4 col-md-6">
              <div class="form-group">
                <label>Confirmar Password: *</label>
                <input name="confirmarPassword" value="" type="password" class="form-control" placeholder="Confirmar Password">
                <p class="errorForm">
              </div>
          </div>
          <div class="col-lg-4 offset-lg-2 col-md-6">
              <div class="form-group">
                <label for="">Zona de residencia: (opcional)</label>
                <select name="zona" value="" class="form-control"> <!--Para que persista hay que poner la variable post en la posicion del name o sea "zona"-->

                </select>
              </div>
          </div>
          <div class="col-lg-4 col-md-6">
              <div class="form-group">
                <label for="">Sube tu avatar: (opcional)</label><br>
                <input class="sin-archivo" type="file" name="avatar" value=""><br>
                <small id="emailHelp" class="form-text text-muted">Extensiones: jpg, jpeg, png.</small>
                <p class="errorForm">
              </div>
          </div>
          <div class="col-lg-4 offset-lg-2 col-md-6">
              <div class="form-group form-check">
                <input value="TerminosAceptados" name="terminos" type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Acepto los terminos y condiciones *</label>
                <p class="errorForm">
              </div>
              <div class="form-group form-check">
                <input value="Newsletter" name="Newsletter" type="checkbox" class="form-check-input" id="exampleCheck2">
                <label class="form-check-label" for="exampleCheck1">Ofertas, enterarme de todo</label>
              </div>
                <button type="submit" class="btn btn-success">Submit</button>
                <br><br><small id="emailHelp" class="form-text text-muted">Los valores con un * son obligatorios.</small>
              </form>
          </div>
        </div>
      </div>
@endsection
