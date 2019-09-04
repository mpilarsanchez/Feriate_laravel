@extends('plantilla')
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/perfil.css">
@section('titulo')
Perfil
@endsection
@section('content')
  <main>
    <div class="info">
          <div class="img">
            @if ($usuarioImagen == null)
              <img src="/images/userdefault.jpg" alt="" class="img-thumbnail">
            @else
              <img src="storage/{{$usuario->imagen[0]['nombre']}}" alt="img-thumbnail">
            @endif
   </div>
    <div class="datos">
        <h1>@if((Auth::check()))
          <h2 class="title">Bienvenid@ {{$usuario->nombre}}</h2>
            @endif</h1>
            @if ((Auth::check()))
              <h4>{{$usuario->email}}</h4>
            @endif
            <h6>Usuario activo desde {{$usuario->created_at}}</h4></h6>
        <button  type="button" name="button"><a href="/editarPerfil/{{$usuario->id}}">Editar informacion</a>  <i class="fas fa-user-edit"></i></button>
     </div>
    </div>
   <div class="secciones">
     <div class="comprar">
        <h1>Gestiona tus ferias..</h1>
        <a href="/misFerias"><button type="button" name="button">Mis ferias  <i class="fas fa-store"></i></button></a>
        <a href="/crearFeria">  <button type="button" name="button">Crea una feria!  <i class="fas fa-store"></i></button></a>
     </div>
     <div class="comprar">
        <h1>.. o tus compras</h1>
        <a href="/carrito"><button type="button" name="button">Mi carrito  <i class="fas fa-shopping-cart"></i></button></a>
        <a href="http://www.mercadopago.com.ar" target="_blank"><button type="button" name="button">Ver mis medios de pago  <i class="fas fa-shopping-cart"></i></button></a>
     </div>
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
@endsection
