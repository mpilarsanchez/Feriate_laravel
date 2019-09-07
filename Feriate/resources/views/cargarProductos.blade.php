@extends('plantilla')
<link rel="stylesheet" href="/css/main.css">
<link rel="stylesheet" href="/css/crear_producto.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
@section('titulo')
Carga tus Productos
@endsection
@section('content')
  <div class="container">
<h1>Vende tu producto!</h1>
<main>
  <form method="post" action="/cargarProductos/{{Request::segment(2)}}" enctype="multipart/form-data">
      {{csrf_field()}}
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="nombre"> Nombre <span>*</span></label>
        <input type="nombre" class="form-control @error('nombre') is-invalid @enderror" id="nombre" placeholder="nombre de tu producto" name="nombre">
          @error('nombre')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
      </div>
      <div class="form-group col-md-4">
        <label for="cantidad"> Cantidad <span>*</span></label>
        <input type="cantidad" class="form-control @error('cantidad') is-invalid @enderror" id="cantidad" placeholder="cantidad de tu producto" name="cantidad">
          @error('cantidad')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
      </div>
      <div class="form-group col-md-4">
        <label for="descripcion">Descripcion<span>*</span></label>
        <textarea type="text" class="form-control" id="descripcion" placeholder="Descripcion" name="descripcion" required ></textarea>
        @error('descripcion')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      <div class="form-group col-md-3">
        <div class="input-group-prepend">
        <label for="inputGroupSelect01">Categoria<span>*</span></label>
          </div>
            <select class="custom-select categoria" id="inputGroupSelect01"  name="categoria">
              @foreach ($categorias as $categoria)
                <option value="{{$categoria["cat_id"]}}">{{$categoria["cat_nombre"]}}</option>
              @endforeach
       </select>
      </div>
      <div class="form-group col-md-3">
        <label for="precio"> Precio <span>*</span></label>
          <input type="precio" class="form-control @error('precio') is-invalid @enderror" id="precio" placeholder="precio de tu producto" name="precio">
        @error('precio')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>

        <div class="form-group col-md-3 talle">
          <div class="input-group-prepend">
            <label for="inputGroupSelect01">Talle<span>*</span></label>
          </div>
          <select class="custom-select" id="inputGroupSelect01" name="talle">
            <option selected>xs</option>
            <option value="1">s</option>
            <option value="2">m</option>
            <option value="3">l</option>
            <option value="4">xl</option>
          </select>
        </div>
        <div class="form-group col-md-3">
            <div class="input-group-prepend">
            <label  for="inputGroupSelect01">Estado <span>*</span></label>
          </div>
          <select class="custom-select" id="inputGroupSelect01" name="estado">
            <option selected>elige</option>
            <option value="bueno">bueno</option>
            <option value="malo">malo</option>
            <option value="nuevo">nuevo</option>
          </select>
      </div>
       </div>
       <h1>Subi fotos!</h1>
       <div class="upload_img">
        <div class="imagen">
          <h3>Imagen Principal</h3>
          <img src="" class="profile" width="200px" />
        <input type="file" class="form-control-file" id="foto1" name="foto_producto" >
        </div>
    </div>
     <button type="submit" class="boton btn btn-outline-light btn btn-lg btn-block mt-3" id="boton">Ferialo!</button>
    </form>
</main>
<script src="/js/productos.js"></script>
</div>
@endsection
