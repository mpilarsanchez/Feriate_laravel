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
          <div class="col-md-6 order-md-2">
            <h2 class="featurette-heading">Bienvenida a la feria {{$feria["nombre"]}} !</h2>
              <p class="lead">{{$feria["descripcion"]}}</p> <p><i class="fas fa-calendar-alt"></i> {{$feria["desde"]}} / {{$feria["hasta"]}} </p>
                 <p class="lead"><a target="_blank" href="https://www.google.com/maps/place/{{$feria["ubicacion"]}}"><i class="fas fa-map-marker-alt"></i> <a/>  {{$feria["ubicacion"]}}</p>
              <p> Te esperamos! </p>

            @if(Auth::check())
                @if($feria["user_id"] == Auth::user()->id)
                 <a href="/feria/{{$feria["id"]}}/cargarProductos"><button id="boton" type="button" name="button">Cargar Productos</button></a>
                 <a href="/editarFeria/{{$feria["id"]}}"><button id="boton" type="button" name="button" disable>Editar Feria</button></a>
              </h2>
               @endif
            @endif

          </div>
          <div class=" order-md-1">
            @if($ImagenFeria == null)
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
    <div class="row d-md-flex justify-content-around">
      @foreach ($feria->productos as $producto)
          <div class="card col-md-4 col-lg-3"" >
            <div class="header-feria">
            @if ($producto->imagen[0]['nombre'] == '')
            <img src="img_user/ropa2.jpg" class="card-img-top" alt="...">
        @else
          <img src="/storage/{{ $producto->imagen[0]['nombre'] }}" class="card-img-top" alt="...">
           @endif
           </div>
          <div class="card-body">
            <h3 class="card-text">{{ $producto['nombre']}}</h3>
            <div class="descripcion">
              <h5 class="descripcion"><b>{{ $producto['descripcion'] }}</b><h5>
             <h5 class="precio">Precio:{{$producto['precio'] }}<h5>
             <h5 class="talle">Talle:{{$producto['talle'] }}</h5>
           </div>
           <div class="descripcion">
             <h5 class="estado">Estado:{{ $producto['estado'] }}</h5>
             <h5 class="cantidad">Cantidad:{{ $producto['cantidad'] }}</h5>
            </div>
        </div>
            <div class="comprar">
            @if((Auth::check()) )
              @if($feria["user_id"] == Auth::user()->id)
               <a href="/editarProducto/{{$producto['id']}}"><button id="boton"  type="button" name="button" class="btn btn-light m-2"><i class="fas fa-tag"></i>  Editar Producto</button></a>
             @else
               <form class="" action="/agregarCarrito" method="post">
                 @csrf
                 <input type="hidden" name="id" value="{{$producto['id']}}">
                 <button type="submit" name="button" class="btn btn-light m-2"><i class="fas fa-shopping-cart"></i>  Agregar al carrito!</button>
               </form>
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
