@extends('plantilla')
<link rel="stylesheet" href="/css/main.css">
<link rel="stylesheet" href="/css/feria.css">

@section('titulo')
Productos
@endsection
@section('content')
  <div class="container">
{{-- //{{dd($categoria)}} --}}
<h2 id="titulo" class="mt-3">Estas viendo categoria / {{$categoria}}</h2>
<hr>
 @if($datosProductos->isEmpty())
     <div class="alert alert-danger" role="alert">
        <p>Lo Sentimos No Hay Productos para la Categoria seleccionada</p>
     </div>
  @else
  <main>
    <div class="row d-md-flex justify-content-around">
      @if($datosProductos[0]->feria['hasta'] < date('m/d/Y'))
        <p>Lo Sentimos No Hay Productos para la categoria Seleccionada</p>
      @else
       @foreach ($datosProductos as $producto)
          <div class="card col-md-4 col-lg-3" >
          <img src="/storage/{{ $producto->imagen[0]['nombre']}}" class="card-img-top" alt="...">
          <div class="card-body">
            <h3 class="card-text">{{ $producto['nombre']}}</h3>
            <div class="descripcion mt-4">
              <h5 class="precio"><b>Precio: {{ $producto['precio'] }}</b></h5>
              <h5 class="talle"><b>Talle 39</b></h5>
              <h5 class="cantidad"><b>cantidad:{{ $producto['cantidad'] }}</b></h5>
            </div>
            <div class="comprar">
                @if(Auth::check())
                  @if($producto["user_id"] != Auth::user()->id)
                     <form class="" action="/agregarCarrito" method="post">
                       @csrf
                       <input type="hidden" name="id" value="{{$producto['id']}}">
                       <button type="submit" class="mt-4"> Agregar al carrito!</button>
                     </form>
                 @endif
                 @else
                      <a href="login.php"><button type="button" class="mt-4" name="button">  Logueate para comprar</a></button>
                @endif
              <a href="/feria/{{ $producto['feria_id'] }}" ><button type="button" class="mt-4" name="button"> Ir a esta feria</a></button>
            </div>
          </div>
        </div>

@endforeach
@endif
{{$datosProductos->links()}}
</div>
@endif
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
@endsection
