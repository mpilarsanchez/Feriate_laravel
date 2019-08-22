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
      <h1>Edita tu feria</h1>
    <div class="registro">
    <form method="post" action="/actualizarFeria/{{$feriaEdit->id}}" enctype="multipart/form-data">
      {{method_field('put')}}
      {{csrf_field()}}
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="nombre"> Nombre de la feria <span>*</span></label>
          <input type="nombre" class="form-control" id="nombre" placeholder="Nombre de tu feria" name="nombre" value="{{$feriaEdit->nombre}}" required>
        </div>
        <div class="form-group col-md-6">
          <label for="ubicacion"> Ubicacion  <span>*</span></label>
          <input type="text" class="form-control" id="ubicacion" placeholder="Ubicacion" name="ubicacion"  value="{{$feriaEdit->ubicacion}}" required>
        </div>
        <div class="form-group col-md-6">
          <label for="datepicker"> Desde <span>*</span></label>
          <input type="text" class="form-control" id="datepicker" placeholder="fecha inicio" name="desde"  value="{{$feriaEdit->desde}}" required>
        </div>
        <div class="form-group col-md-6">
          <label for="datepicker1"> Hasta <span>*</span></label>
          <input type="text" class="form-control" id="datepicker1" placeholder="fecha finalizacion" name="hasta"  value="{{$feriaEdit->hasta}}" required>
        </div>
        <script src="./js/crear_feria.js"></script>
        <div class="form-group col-md-6">
          <label for="descripcion"> Descripcion <span>*</span></label>
          <input type="text" name="descripcion" class="form-control" id="descripcion" placeholder="descripcion"  value="{{$feriaEdit->descripcion}}">
        </div>
        <div class="foto">
          <div class="form-group col-md-6">
            <label for="foto_feria">Subi una Foto de tu feria:</label>
            <div class="display">
            </div>
            <input type="file" id="upload" name="imagen">

      <button type="submit"id="crear" class="btn btn-primary">Actualizar!</button>

    </form>
    <form method="post" action="/borrarFeria/{{$feriaEdit->id}}" enctype="multipart/form-data">
      {{method_field('delete')}}
      {{csrf_field()}}
    <button type="submit"id="crear" class="btn btn-primary">Borrar Feria!</button>
    </form>
    <ul>
      {{-- @foreach ($errores as $error)
        <li class="alert alert-danger" role="alert">{{$error}}</a></li>
      @endforeach --}}
    </ul>
    </div>
  </div>
  <main>
    <div class="producto">
      <h1>Tus productos</h1>
  {{-- @if(!empty($datos_productos))
    @foreach ($datos_productos as $producto)
          <div class="card col-md-6 mt-4" >
            @if ($producto['img_nombre'] != '')
          <img src="img_user/{{$producto['img_nombre']}}" class="card-img-top mt-2" alt="...">
        @endif
          @if ($producto['img_nombre'] == '')
          <img src="img_user/ropa2.jpg" class="card-img-top" alt="...">
        @endif  --}}
          <div class="card-body">
            {{-- <h4 class="card-text">{{$producto['pr_nombre']}}</h4>
            <div class="descripcion">
             <h3 class="precio"><b>Precio:{{$producto['pr_precio']}}</b><h3>
             <h3 class="talle"><b>Talle:{{$producto['pr_talle']}}</b></h3>
             <h3 class="marca"><b>Marca:{{$producto['pr_marca']}}</b></h3>
           </div>
           <div class="descripcion">
             <h3 class="estado"><b>Estado:{{$producto['pr_estado']}}</b></h3>
             <h3 class="cantidad"><b>Cantidad:{{$producto['pr_cantidad']}}</b></h3>
            </div> --}}
        </div>
            <div class="comprar">
{{--
           @if(estaLogueado()):?>
             @if(esDuenoDeFeria($value))
              <a href="editar_producto.php?id={{$producto['pr_id']}}"><button id="boton"  type="button" name="button" class="btn btn-light m-2"><i class="fas fa-tag"></i>  Editar Producto</button></a>
            @endif
         @endif
</div>
            </div>
          </div>
        @endforeach
      @endif  --}}
        <script src="../js/crear_feria.js"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
         <link rel="stylesheet" href="/resources/demos/style.css">
        </div>
      @endsection
