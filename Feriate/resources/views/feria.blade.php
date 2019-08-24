@extends('plantilla')
<link rel="stylesheet" href="../css/main.css">
<link rel="stylesheet" href="../css/feria.css">
@section('titulo')
Feria
@endsection
@section('content')
<div class="container">
  <div class="inicio">
    <div class="imagen">
      <img src="/images/inicio.jpg" alt="">
    </div>
    <div class="info">
      <h1>{{$feria["nombre"]}}</h1>
          {{-- <h4 ><a href="#">Ver Mas Ferias de {{$feria->duenio->getNombreCompleto()}}</a></h4> --}}
          <h2> <i class="fas fa-star-of-life"></i>{{$feria["ubicacion"]}}</h2><h4><a target="_blank" href="https://www.google.com/maps/place/{{$feria['ubicacion']}}" title="Click para ver en el mapa">Ver ubicacion</a> </h4>
          <h2> <i class="fas fa-star-of-life"></i>{{$feria["descripcion"]}}</h2>
          <h2> <i class="fas fa-star-of-life"></i>Fecha Inicio:{{$feria["desde"]}}</h2>
          <h2> <i class="fas fa-star-of-life"></i>Fecha Finalizacion:{{$feria["hasta"]}}</h2>
      @if(Auth::check())
          @if($feria["user_id"] == Auth::user()->id)
           <a href="/feria/{{$feria["id"]}}/cargarProductos"><button id="boton" type="button" name="button">Cargar Productos</button></a>
           <a href="/editarFeria/{{$feria["id"]}}"><button id="boton" type="button" name="button" disable>Editar Feria</button></a>
         @endif
      @endif
    </div>
  </div>
  <hr/>
    @if(empty($feria->productos))
     <div class="alert alert-danger" role="alert">
       <p>Lo Sentimos No Hay Productos para la Feria seleccionada</p>
    </div>
  @else
  <main>
    <div class="producto">
      @foreach ($feria->productos as $producto)
          <div class="card" >
            @if ($producto['img_nombre'] != '')
          <img src="img_user/{{ $producto['nombre'] }}" class="card-img-top" alt="...">
             @endif
          @if ($producto['img_nombre'] == '')
          <img src="img_user/ropa2.jpg" class="card-img-top" alt="...">
           @endif
          <div class="card-body">
            <h4 class="card-text">{{ $producto['nombre']}}</h4>
            <div class="descripcion">
              <h3 class="descripcion"><b>descripcion:{{ $producto['descripcion'] }}</b><h3>
             <h3 class="precio"><b>Precio:{{$producto['precio'] }}</b><h3>
             <h3 class="talle"><b>Talle:{{$producto['talle'] }}</b></h3>
             <h3 class="marca"><b>Marca:{{ $producto['marca'] }}</b></h3>
           </div>
           <div class="descripcion">
             <h3 class="estado"><b>Estado:{{ $producto['estado'] }}</b></h3>
             <h3 class="cantidad"><b>Cantidad:{{ $producto['cantidad'] }}</b></h3>
            </div>
        </div>
            <div class="comprar">
            @if((Auth::check()) )
              @if($feria["user_id"] == Auth::user()->id)
               <a href="/editarProducto/{{$producto['id']}}"><button id="boton"  type="button" name="button" class="btn btn-light m-2"><i class="fas fa-tag"></i>  Editar Producto</button></a>
             @else
               <a href="carrito"><button type="button" name="button" class="btn btn-light m-2"><i class="fas fa-shopping-cart"></i>  Agregar al carrito!</button></a>
               <button type="button" name="button" class="btn btn-light m-2"><i class="fas fa-tag"></i>  Reserva este articulo!</button>
               @endif
            @else
              <a href="/login" ><button type="button" name="button" class="btn btn-light m-2"><i class="fas fa-tag"></i>  logueate para comprar</button></a>
             @endif

            </div>
          </div>
        @endforeach
      @endif
 </div>
</div>
@endsection
