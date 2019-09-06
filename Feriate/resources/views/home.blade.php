@extends('plantilla')
  <link rel="stylesheet" href="./css/style.css">
@section('titulo')
Home
@endsection
@section('content')
    <div class="encabezado">
        @include("slides")
    </div>
    <h1 class="titulo mb-2">LAS FERIAS MAS VISITADAS</h1>
    <h4>podes ver todas las ferias <a href="
    #">aqui</a></h4>
    @include("carrousel")
      <main>
          <h1 class="titulo">CATEGORIAS</h1>
          <div class="categorias">
            <article class="cat">
            <div class="texto">
              @foreach ($categorias as $categoria)
                <h2>{{$categoria["cat_nombre"]}}</h2>
                <a href="ferias/categoria/{{$categoria["cat_nombre"]}}"><button type="button" name="button">VER LAS FERIAS</button></a>
                <a href="productos/categoria/{{$categoria["cat_nombre"]}}"><button type="button" name="button">VER PRODUCTOS</button></a>
                </div>
                <div class="imagen">
                  <img src="images/{{$categoria["cat_img"]}}" alt="">
                </div>
                </article>
                <article class="cat">
                <div class="texto">
              @endforeach
            </article>
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
@endsection
