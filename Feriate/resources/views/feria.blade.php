@extends('plantilla')
<link rel="stylesheet" href="../css/main.css">
<link rel="stylesheet" href="../css/feria.css">
@section('titulo')
Feria
@endsection
@section('content')
<div class="container">
  <div class="inicio">
    <div class="row featurette">
          <div class="col-md-7 order-md-2">
            <h2 class="featurette-heading">Bienvenida a la feria {{$feria["nombre"]}} !
              <p class="lead">{{$feria["descripcion"]}} . Encontrala desde {{$feria["desde"]}} hasta {{$feria["hasta"]}} . Te esperamos! </p>
            @if(Auth::check())
                @if($feria["user_id"] == Auth::user()->id)
                 <a href="/feria/{{$feria["id"]}}/cargarProductos"><button id="boton" type="button" name="button">Cargar Productos</button></a>
                 <a href="/editarFeria/{{$feria["id"]}}"><button id="boton" type="button" name="button" disable>Editar Feria</button></a>
               @endif
            @endif

          </div>
          <div class="col-md-5 order-md-1">
            @if($ImagenFeria == null)
              <img src="/images/logo_feriate_deffault.png" alt="">
              <img src="/images/logo_feriate_deffault_ii.png" alt="">
            @else
            <img class="img-thumbnail" class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="500x500" src="/storage/{{$feria->imagen[0]["nombre"]}}" data-holder-rendered="true" style="width: 300px; height: 300px;">
            @endif
          </div>
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
    <div class="d-md-flex justify-content-around">
      @foreach ($feria->productos as $producto)
          <div class="card" >
            @if ($producto->imagen[0]['nombre'] == '')
            <img src="img_user/ropa2.jpg" class="card-img-top" alt="...">
        @else
          <img src="/storage/{{ $producto->imagen[0]['nombre'] }}" class="card-img-top" alt="...">
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
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
@endsection
