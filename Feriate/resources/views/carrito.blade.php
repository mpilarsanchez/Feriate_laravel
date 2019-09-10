@extends('plantilla')
<link rel="stylesheet" href="../css/main.css">
<link rel="stylesheet" href="../css/feria.css">

@section('titulo')
Carrito
@endsection
@section('content')
<h2 id="titulo" class="mt-3">Estas viendo tu carrito de compras!</h2>
  <hr>
<div class="productos">
  @if($datosProductos == null)
         <p>Lo Sentimos No Hay Productos en su carrito</p>
  @else
      </div>
        <div class="row d-md-flex justify-content-around">
        @foreach ($datosProductos as $producto)
  <div class="card col-md-4 col-lg-3" >
 <img src="/storage/{{ $producto->imagen[0]['nombre']}}" class="card-img-top" alt="...">
  <div class="card-body">
    <h3 class="card-text">{{$producto['nombre']}}</h3>
    <div class="descripcion"><h3>{{ $producto['descripcion']}}</h3>
      <h5 class="precio"><b>{{ $producto['precio']}}</b></h5>
      <h5 class="talle"><b>{{$producto['talle']}}</b></h5>
    </div>
    <div class="comprar">
      <button type="button" name="button"> <i class="fas fa-shopping-cart"></i> <a href="carrito">Comprar</a></button>
<form class="" action="/quitarCarrito" method="post">
  @csrf
  <input type="hidden" name="id" value="{{$producto['id']}}">
  <button type="submit"><i class="fas fa-tag"></i> Quitar del carrito</button>
</form>
      <a class="ver_mas" href="/productos/categoria/{{$categoria[0]['cat_nombre']}}">  Ver productos similares</a>
    </div>
  </div>
</div>
</div>
@endforeach
@endif
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
@endsection
