@extends('plantilla')
<link rel="stylesheet" href="/css/main.css">
<link rel="stylesheet" href="/css/crear_producto.css">
<link rel="stylesheet" href="/css/style.css">
<link rel="stylesheet" href="/css/footer.css">
<script src="/js/productos.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
@section('titulo')
Carga tus Productos
@endsection
@section('content')
  <div class="container">
<h1>Vende tu producto!</h1>
<main>
  <form method="post" action="/editarProductos/{{$productoEdit['id']}}" enctype="multipart/form-data">
    {{method_field('put')}}
    {{csrf_field()}}
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="nombre"> Nombre <span>*</span></label>
        <input type="nombre" class="form-control @error('nombre') is-invalid @enderror" id="nombre" placeholder="nombre de tu producto" name="nombre" value="{{$productoEdit['nombre']}}">
          @error('nombre')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
      </div>
      <div class="form-group col-md-6">
        <label for="descripcion">Descripcion<span>*</span></label>
        <textarea type="text" class="form-control" id="descripcion" placeholder="Descripcion" name="descripcion" required >{{$productoEdit['descripcion']}}</textarea>
        @error('descripcion')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      <div class="form-group col-md-4">
        <div class="input-group-prepend">
        <label class="input-group-text" for="inputGroupSelect01">Categoria<span>*</span></label>
          </div>
            <select class="custom-select categoria" id="inputGroupSelect01"  name="categoria" value="{{$productoEdit['categoria']}}">
              @foreach ($categorias as $categoria)
                @if( $productoEdit["categoria_id"] == $categoria["cat_id"])
                <option value="{{$categoria["cat_id"]}}" selected>{{$categoria["cat_nombre"]}}</option>
              @endif
                <option value="{{$categoria["cat_id"]}}">{{$categoria["cat_nombre"]}}</option>
              @endforeach
       </select>
      </div>
      <div class="form-group col-md-6">
        <label for="precio"> Precio <span>*</span></label>
          <input type="precio" class="form-control @error('precio') is-invalid @enderror" id="precio" placeholder="precio de tu producto" name="precio" value="{{$productoEdit['precio']}}">
        @error('precio')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      <div class="form-group col-md-6">
        <label for="cantidad"> Cantidad <span>*</span></label>
        <input type="text" name="cantidad" class="form-control" id="cantidad" placeholder="Cantidad" required value="{{$productoEdit['cantidad']}}">
        @error('cantidad')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
        <div class="form-group col-md-4 talle">
          <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Talle<span>*</span></label>
          </div>
          <select class="custom-select" id="inputGroupSelect01" name="talle">
            <option selected>{{$productoEdit['talle']}}</option>
            <option value="1">s</option>
            <option value="2">m</option>
            <option value="3">l</option>
            <option value="4">xl</option>
          </select>
        </div>
        <div class="form-group col-md-4">
            <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Estado <span>*</span></label>
          </div>
          <select class="custom-select" id="inputGroupSelect01" name="estado">
            <option selected>{{$productoEdit['estado']}}</option>
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
          <img src="/{{$productoEdit->imagenes[0]['nombre']}}" class="profile" width="200px" />
          <input type="file" class="form-control-file" id="foto1" name="foto_producto">
        </div>
    </div>
     <input type="hidden" name="feria_id" value="{{$productoEdit['feria_id']}}">
     <button type="submit" class="btn btn-outline-light btn btn-lg btn-block mt-3" id="boton">Actualizar!</button>
    </form>
    <form class="" action="/borrarProducto/{{$productoEdit['id']}}" method="post" id="eliminarproducto">
      {{method_field('delete')}}
      {{csrf_field()}}
      <button type="submit" class="btn btn-outline-light btn btn-lg btn-block mt-3" id="eliminar" >Borrar</button>
      <input type="hidden" name="feria_id" value="{{$productoEdit['feria_id']}}">
    </form>
</main>
<div id="dialog-confirm" title="Eliminar Usuario?" style="display:none">
  <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>Esta seguro que desea eliminar Este Producto?</p>
</div>
</div>
@endsection

<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.1/jquery-ui.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css" />
<script src="/js/productos.js"></script>
