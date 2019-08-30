<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Oswald|Pathway+Gothic+One|Source+Sans+Pro&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cookie|Inconsolata&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/14dd9125ec.js"></script>
  <title>
    @yield('titulo')
  </title>
</head>
  <body>
    <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <a class="navbar-brand" href="/index">
              Feriate.com  <i class="fas fa-store"></i>
            </a>
            <div class="dropdown" id="dropdown" >
            <a class="nav-link" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Menu
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu2" id="dropmenu">
              <button class="dropdown-item" id="dropitem"  type="button"><a href="/donaciones">Donaciones</a></button>
              <div class="dropdown-divider" id="divider"></div>
              <button class="dropdown-item" id="dropitem" type="button"><a href = "/quienes_somos">Quienes somos?</a></button>
              <div class="dropdown-divider" id="divider"></div>
              <button class="dropdown-item" id="dropitem" type="button"><a href="/contacto">Contacto</a></button>
              <div class="dropdown-divider" id="divider"></div>
              <button class="dropdown-item" id="dropitem" type="button"> <a  href="/preguntas">Preguntas Frecuentes</a></button>
            </div>
          </div>
          <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            @if(!Auth::check())
            <a class="nav-link" href="/login">Ingresar</a>
          @endif
            @if(Auth::check())
            <a  href="{{ route('logout') }}" class="nav-link"  name="sesion"  onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">Cerrar Sesion</a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
           <a href="/perfil" class="nav-link">Mi Perfil</a>
            @endif;
              </ul>
            <form class="form-inline my-2 my-lg-0" action="/search" method="post">
              @csrf
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
          </div>
        </nav>
  </header>
  <section>
    @yield('content')
  </section>

    </body>
</html>
