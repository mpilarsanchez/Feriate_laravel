@extends('plantilla')
<link rel="stylesheet" href="/css/main.css">
<link rel="stylesheet" href="/css/feria.css">

@section('titulo')
Productos
@endsection
@section('content')
  <div class="container">
    <div class="inicio">
          <div class="row featurette">
          <div class="col-md-7 order-md-2">
            <?php // IDEA: ACA IRIA EL NOMBRE DE LA CATEGORIA ?>
              <h2 class="featurette-heading my-5">Estas viendo {producto}</h2>
              </div>
              <div class="col-md-5 order-md-1">
                  <?php // IDEA: ACA IRIA LA IMAGEN DE LA CATEGORIA ?>
                <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="500x500" src="/images/donar1.jpg" data-holder-rendered="true" style="width: 200px; height: 200px;">
              </div>

      </div>
        </div>
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
                    <a href="/carrito"> <button type="button" name="button" class="btn btn-light m-2"><i class="fas fa-shopping-cart"></i>  Agregar al carrito!</a></button>
                    <button type="button" name="button" class="btn btn-light m-2"><i class="fas fa-tag"></i>  Reserva este articulo!</button>
                 @endif
                 @else
                      <a href="login.php"><button type="button" name="button" class="btn btn-light m-2"><i class="fas fa-tag"></i> Comprar</a></button>
                @endif
              <a href="/feria/{{ $producto['feria_id'] }}" ><button type="button" name="button" class="btn btn-light m-2"><i class="fas fa-tag"></i>  Ir a esta feria</a></button>
            </div>
          </div>
        </div>
@endforeach
{{$datosProductos->links()}}
</div>
@endif
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
@endsection
