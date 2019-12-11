<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- ionicons JS --><script type="module" src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons/ionicons.esm.js"></script>
    <!-- ionicons JS --><script nomodule="" src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons/ionicons.js"></script>
    <!-- Bootstrap JS --><script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Bootstrap JS --><script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <!-- Bootstrap JS --><script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS --><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- ionicons CSS --><link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <!-- FontAwesome CSS --><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" integrity="sha256-46qynGAkLSFpVbEBog43gvNhfrOj+BmwXdxFgVK/Kvc=" crossorigin="anonymous" />
    <!-- Google Fonts --><link href="https://fonts.googleapis.com/css?family=Roboto:300|Rubik&display=swap" rel="stylesheet">
    <!-- Mi css General --><link rel="stylesheet" href="/css/general.css">
    <!-- Mi css Footer --><link rel="stylesheet" href="/css/footer.css">
    <!-- Mi css Header --><link rel="stylesheet" href="/css/header.css">
    <!-- Mi css Socialbar --><link rel="stylesheet" href="/css/socialbar.css">
    <title>@yield('titulo')</title>
    <link rel="stylesheet" href="/css/@yield('css').css">
  </head>
  <body>
    <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/home"><img class="logo" src="/img/Logo2.png" alt = "Logo"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="barra collapse navbar-collapse" id="navbarNav">
          <!--dropdown-->
          <div class="dropdown dropdown-menu-center">
            <a class="btn dropdown-toggle dropdown-productos" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Productos
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <a class="dropdown-item oferta" href="ofertas">Ofertas</a>
              <a class="dropdown-item" href="remeras">Remeras</a>
              <a class="dropdown-item" href="camisas">Camisas</a>
              <a class="dropdown-item" href="jeans">Jeans</a>
              <a class="dropdown-item" href="buzos">Buzos</a>
              <a class="dropdown-item" href="camperas">Camperas</a>
              <a class="dropdown-item" href="accesorios">Accesorios</a>
            </div>
          </div>
          <!--dropdown-->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="/nosotros">Nosotros</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/contact">Contactanos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/ayuda">Ayuda</a>
            </li>
            </ul>
            <ul class="navbar-nav usuario">
            @if (Auth::user())
            <li class="nav-item">
              <a class="nav-link" href="products/addProduct"><i class="fas fa-plus-circle"></i> Add Product</a>
              <a class="nav-link" href="/profile"><i class="fas fa-user"></i> {{auth::user()->first_name}} </a>
            </li>
            <li>
                <form class="" action="logout" method="post">
                  @csrf
                  {{-- <a class="nav-link" type="submit" alt="desloguearme"><i class="fas fa-sign-out-alt"></i> Cerrar Sesion</a> --}}
                  <button class="nav-link" type="submit" name="button"><i class="fas fa-sign-out-alt"></i>Cerrar Sesion</button>
                </form>
            </li>
            @else
                  <li class="nav-item">
                    <a class="nav-link" href="/register"><i class="fas fa-user-plus"></i> Registrarse</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/login"><i class="fas fa-sign-in-alt"></i> Iniciar Sesion</a>
                  </li>
            @endif
            <li class="nav-item">
              <a class="nav-link" href="/cart"><i class="fas fa-shopping-cart"></i></a>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <main>
      @yield('main')
    </main>
    <footer>
      <div class="linea-separadora">

      </div>
      <div class="cuerpo-footer centrado">
        <div class="row">
          <div class="col-xs-12 col-md-4 col-lg-4">
            <h5>AYUDA</h5>
            <ul>
              <li><a href="ayuda">Como comprar</a> |</li>
              <li><a href="ayuda">Guia de talles</a> |</li>
              <li><a href="ayuda">Cambios y devoluciones</a> |</li>
              <li><a href="ayuda">FAQ</a> |</li>
              <li><a href="nosotros">Donde estamos</a> </li>
            </ul>
          </div>
          <div class="col-xs-12 col-md-4 col-lg-4">
            <h5>NUESTRAS REDES</h5>
            <ul>
              <li><ion-icon class="rounded-circle border" name="logo-facebook"></ion-icon></li>
              <li><ion-icon class="rounded-circle border" name="logo-googleplus"></ion-icon></li>
              <li><ion-icon class="rounded-circle border" name="logo-twitter"></ion-icon></li>
              <li><ion-icon class="rounded-circle border" name="logo-linkedin"></ion-icon></li>
              <li><ion-icon class="rounded-circle border" name="logo-dribbble"></ion-icon></li>
            </ul>
          </div>
          <div class="col-xs-12 col-md-4 col-lg-4">
            <h5>NUESTRO NEWSLETTER</h5>
            <form class="" action="index.php" method="post" enctype="multipart/form-data">
              @csrf
              <input type="email" class="newsletter" placeholder="Dejanos tu email"></input>
              <button class="newsletter" type="submit" name="button"><i class="fas fa-at"></i></button>
              <small class="form-text text-muted">Enterate de todo.</small>
          </form>
          </div>
        </div>
      </div>
      <div class="copyright">
        <div>
          <span>All rights reserved   ®</span>
        </div>
        <div>
          <span>Oklahoma © 2019</span>
        </div>
        <div class="">
          <span>diseño por <a class="creador" href="#">nombre</a></span>
        </div>
      </div>
</footer>
  </body>
</html>
