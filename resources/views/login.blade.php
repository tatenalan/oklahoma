@extends('plantilla')
@section('titulo')
Login
@endsection
@section('css')
login
@endsection
@section('main')
  <section class="form-container">
			<h1 class="titulo">Inicia Sesion</h1>
			<form class="access-form" action="" method="post">
				<div class="field-group">
					<label for="email">Email</label>
					<input type="email" id="email" name="email" placeholder="correo@dominio.com" value="<?php if($_POST){ echo $_POST['email'];}?>">
				</div>
				<div class="field-group">
					<label for="password">Contraseña</label>
					<input type="password" id="passsword" name="password" placeholder="**********" value="">
				</div>
				<div class="field-group remember-me">
					<input type="checkbox" id="remember-me" name="recordame" value="recordame">
					<label for="remember-me"><h6>Recordarme</h6></label>
				</div>


        <button type="submit" class="btn btn-success">Ingresar</button>
			</form>
      <h6>No tienes una cuenta? <a href="/register">Crear cuenta</a></h6>
      <h6>Olvidaste tu password? <a href="/home">Recuperar password</a></h6>
	</section>
@endsection
