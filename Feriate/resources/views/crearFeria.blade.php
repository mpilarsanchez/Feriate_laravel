@extends('plantilla')
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/crear_feria.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
@section('titulo')
Crea tu Feria
@endsection
@section('content')
  <div class="container">
  <h2 id="titulo">Estas creando una feria</h2>
  <div class="formulario">
  <form method="post" action="crearFeria" enctype="multipart/form-data">
    {{csrf_field()}}
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="nombre"> Nombre de la feria <span>*</span></label>
      <input type="nombre" class="form-control @error('nombre') is-invalid @enderror" id="nombre" placeholder="Nombre de tu feria" name="nombre" required>
      @error('nombre')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
    </div>
    <div class="form-group col-md-6">
      <label for="ubicacion"> Ubicacion  <span>*</span></label>
      <input type="text" class="form-control  @error('ubicacion') is-invalid @enderror" id="ubicacion" placeholder="Ubicacion" name="ubicacion" required>
      @error('ubicacion')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
    </div>
    <div class="form-group col-md-4">
      <label for="datepicker"> Desde <span>*</span></label>
      <input type="text" class="form-control @error('desde') is-invalid @enderror" id="datepicker" placeholder="fecha inicio" name="desde" required>
      @error('desde')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
    </div>
    <div class="form-group col-md-4">
      <label for="datepicker1"> Hasta <span>*</span></label>
      <input type="text" class="form-control @error('hasta') is-invalid @enderror" id="datepicker1" placeholder="fecha finalizacion" name="hasta" required>
    </div>
    <script src="./js/crear_feria.js"></script>
    <div class="form-group col-md-4">
      <label for="descripcion"> Descripcion <span>*</span></label>
      <input type="text" name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" placeholder="descripcion">
      @error('hasta')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
    </div>
    <div class="foto">
      <div class="form-group">
        <label for="foto_feria">Subi una Foto de tu feria:</label>
        <div>
          @error('foto_feria')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>
        <img class="ml-4"src="" id="profile-img-tag" width="200px" />
        <br>
        <input class="mt-3" type="file"  id="upload" name="foto_feria"  class="form-control @error('foto_feria') is-invalid @enderror">
          @error('foto_feria')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        <br>
  <button type="submit"id="crear" class="mt-4" >Feriate!</button>
  <p class="mt-4">Despues de crear tu Feria , podes subir tus productos</p>
  </form>
  </div>
  </div>
</div>
</div>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   <link rel="stylesheet" href="/resources/demos/style.css">

  <script src="../js/crear_feria.js"></script>

@endsection
