@extends('plantilla')
<link rel="stylesheet" href="/css/main.css">
<link rel="stylesheet" href="/css/feria.css">
<link rel="stylesheet" href="/css/productos.css">
<link rel="stylesheet" href="/css/footer.css">
@section('titulo')
Productos
@endsection
@section('content')
  <div class="container">
    <div class="inicio">
        <h1>Productos</h1>
    </div>
     @if(!$datosProductos->isEmpty())
  <div class="botones">
    <div class="dropdown">
      <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        ORDENAR POR
      </a>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <a class="dropdown-item" href="#">Action</a>
        <a class="dropdown-item" href="#">Another action</a>
        <a class="dropdown-item" href="#">Something else here</a>
      </div>
    </div>
    <div class="dropdown">
      <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        FILTRAR POR
      </a>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <a class="dropdown-item" href="#">Action</a>
        <a class="dropdown-item" href="#">Another action</a>
        <a class="dropdown-item" href="#">Something else here</a>
      </div>
    </div>
  </div>
@endif
  <hr>
 @if($datosProductos->isEmpty())
     <div class="alert alert-danger" role="alert">
    @if(isset($busqueda) && $busqueda != '')   
        <p>Lo Sentimos No Hay Productos para la Busqueda {{ $busqueda }}</p>
    @else
        <p>Lo Sentimos No Hay Productos para la Categoria seleccionada</p>
    @endif
     </div>
  @else
  <main>
    <div class="producto">
      @foreach ($datosProductos as $producto)
          <div class="card" >
          <img src="images/shoes.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <p class="card-text">{{ $producto['nombre']}}</p>
            <div class="descripcion">
              <h3 class="precio"><b>Precio: {{ $producto['precio'] }}</b></h3>
              <h3 class="talle"><b>Talle 39</b></h3>
              <h3 class="cantidad"><b>cantidad:{{ $producto['cantidad'] }}</b></h3>
            </div>
            <div class="comprar">
                @if(Auth::check())
                  @if(!$producto["user_id"] == Auth::user()->id)
                    <a href="/carrito"> <button type="button" name="button"><i class="fas fa-shopping-cart"></i>  Agregar al carrito!</a></button>
                    <button type="button" name="button"><i class="fas fa-tag"></i>  Reserva este articulo!</button>
                 @endif
                 @else
                      <a href="login.php"><button type="button" name="button"><i class="fas fa-tag"></i>  Logueate para comprar</a></button>
                @endif
              <a href="/feria/{{ $producto['feria_id'] }}" ><button type="button" name="button"><i class="fas fa-tag"></i>  Ir a esta feria</a></button>
            </div>
          </div>
        </div>
@endforeach
{{$datosProductos->links()}}
</div>
@endif
@endsection
