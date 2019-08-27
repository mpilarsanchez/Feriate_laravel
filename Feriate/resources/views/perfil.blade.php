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
            @if (Auth::check())
              {{-- <img src="/images/{{$usuario->imagen->["nombre"]}}" alt="img-thumbnail"> --}}
            @endif
            @if ((Auth::check())["img_nombre"] == null)
            <img src="/images/userdefault.jpg" alt="" class="img-thumbnail">
            @endif
   </div>
    <div class="datos">
        <h1>@if((Auth::check()))
          <h2 class="title">Bienvenido {{$usuario->nombre}}</h2>
            @endif</h1>
            @if ((Auth::check()))
              <h4>{{$usuario->email}}</h4>
            @endif
            <h6>Usuario activo desde {{$usuario->created_at}}</h4></h6>
        <button  type="button" name="button"><a href="/editarPerfil">Editar informacion</a>  <i class="fas fa-user-edit"></i></button>
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
@endsection
