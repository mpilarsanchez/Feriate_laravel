@extends('plantilla')
<link rel="stylesheet" href="../css/main.css">
<link rel="stylesheet" href="../css/crear_feria.css">

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
@section('titulo')
Edita tu feria
@endsection
@section('content')
    <div class="container">
      <h2 id="titulo">Estas editando tu feria</h2>
      <div class="formulario">


    <form method="post" action="/actualizarFeria/{{$feriaEdit->id}}" enctype="multipart/form-data">
      {{method_field('put')}}
      {{csrf_field()}}
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="nombre"> Nombre de la feria <span>*</span></label>
          <input type="nombre" class="form-control @error('nombre') is-invalid @enderror"  id="nombre" placeholder="Nombre de tu feria" name="nombre" value="{{$feriaEdit->nombre}}" required>
          @error('nombre')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>
        <div class="form-group col-md-4">
          <label for="ubicacion"> Ubicacion  <span>*</span></label>
          <input type="text" class="form-control @error('ubicacion') is-invalid @enderror" id="ubicacion" placeholder="Ubicacion" name="ubicacion"  value="{{$feriaEdit->ubicacion}}" required>
          @error('ubicacion')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>
        <div class="form-group col-md-4">
          <label for="datepicker"> Desde <span>*</span></label>
          <input type="text" class="form-control @error('desde') is-invalid @enderror" id="datepicker" placeholder="fecha inicio" name="desde"  value="{{$feriaEdit->desde}}" required>

          @error('desde')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
          </div>
        <div class="form-group col-md-4">
          <label for="datepicker1"> Hasta <span>*</span></label>
          <input type="text" class="form-control @error('hasta') is-invalid @enderror" id="datepicker1" placeholder="fecha finalizacion" name="hasta"  value="{{$feriaEdit->hasta}}" required>
          @error('hasta')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>
        <script src="./js/crear_feria.js"></script>
        <div class="form-group col-md-4">
          <label for="descripcion"> Descripcion <span>*</span></label>
          <input type="text" name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" placeholder="descripcion"  value="{{$feriaEdit->descripcion}}">
          @error('descripcion')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>
        <div class="foto">
          <div class="form-group">
            <label for="foto_feria">Cambia la Foto de tu feria:</label>
          <div class="display">
          @if($feriaEdit->imagen[0]["nombre"] == null)
            <img src="/images/logo_feriate_deffault_ii.png" alt="">
          @else
          <img id='profile-img-tag' class="img-thumbnail" class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="500x500" src="/storage/{{$feriaEdit->imagen[0]["nombre"]}}" data-holder-rendered="true" style="width: 300px; height: 300px;">
          @endif
          <input  class="mt-3" type="file" id="upload" name="imagen">
        </div>
        </div>
        </div>
    </div>
      <button type="submit"id="crear" class="btn btn-primary">Actualizar!</button>
    </form>
    <form method="post" action="/borrarFeria/{{$feriaEdit->id}}" enctype="multipart/form-data">
      {{method_field('delete')}}
      {{csrf_field()}}
    <button type="submit"id="crear" class="btn btn-primary">Borrar Feria!</button>
    </form>
      </div>
  <h1>Tus productos</h1>
  <div class="row d-md-flex justify-content-around">
  @if(!$datos_productos->isEmpty())
    @foreach ($datos_productos as $producto)
          <div class="card col-md-4 col-lg-3" >
              <img src="/storage/{{$producto->imagen[0]['nombre']}}" class="card-img-top mt-2" height="240px;"alt="...">
          <div class="card-body">
           <h4 class="card-text">{{$producto['nombre']}}</h4>
            <div class="descripcion">
             <h3 class="precio"><b>Precio:{{$producto['precio']}}</b><h3>
             <h3 class="talle"><b>Talle:{{$producto['talle']}}</b></h3>
             <h3 class="marca"><b>Marca:{{$producto['marca']}}</b></h3>
           </div>
           <div class="descripcion">
             <h3 class="estado"><b>Estado:{{$producto['estado']}}</b></h3>
             <h3 class="cantidad"><b>Cantidad:{{$producto['cantidad']}}</b></h3>
            </div>
            <div class="comprar">
           @if(Auth::check())
             @if($producto["user_id"] == Auth::user()->id)
              <a href="/editarProducto/{{$producto['id']}}"><button id="boton"  type="button" name="button" class="btn btn-light m-2"><i class="fas fa-tag"></i>  Editar Producto</button></a>
            @endif
         @endif
            </div>
            </div>
          </div>
        @endforeach
      @else
        <p>Todavia no cargaste ningun producto</p>
      @endif

  </div>
        <script src="../js/crear_feria.js"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
         <link rel="stylesheet" href="/resources/demos/style.css">

      @endsection
