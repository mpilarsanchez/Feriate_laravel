@extends('plantilla')
<link rel="stylesheet" href="../css/main.css">
<link rel="stylesheet" href="../css/feria.css">
<link rel="stylesheet" href="../css/carrito.css">
@section('titulo')
Carrito
@endsection
@section('content')
  <div class="carrito">
       <div class="inicie">
         <h1>Mis Compras</h1>
       </div>
         <img class="imagen_carrito" src="./images/carrito.png" alt="">
    </div>
  <hr>
<div class="productos">

  <div class="card" >
  <img src="images/reloj.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h3 class="card-text">Reloj nuevo sin uso</h3>
    <div class="descripcion">
      <h5 class="precio"><b>$950</b></h5>
      <h5 class="talle"><b>Talle S</b></h5>
    </div>
    <div class="comprar">
      <button type="button" name="button"> <i class="fas fa-shopping-cart"></i> <a href="carrito">COMPRAR</a></button>
      <button type="button" name="button"><i class="fas fa-tag"></i>  Quitar del carrito</button>
      <a class="ver_mas" href="#">  Ver más del vendedor</a>
    </div>
  </div>
</div>
  <div class="card" >
  <img src="images/reloj.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h3 class="card-text">Reloj nuevo sin uso</h3>
    <div class="descripcion">
      <h5 class="precio"><b>$950</b></h5>
      <h5 class="talle"><b>Talle S</b></h5>
    </div>
    <div class="comprar">
      <button type="button" name="button"> <i class="fas fa-shopping-cart"></i> <a href="carrito">COMPRAR</a></button>
      <button type="button" name="button"><i class="fas fa-tag"></i>  Quitar del carrito</button>
      <a class="ver_mas" href="#">  Ver más del vendedor</a>
    </div>
  </div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
@endsection
