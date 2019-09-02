@extends('plantilla')
  <link rel="stylesheet" href="/css/index.css">
  <link rel="stylesheet" href="/css/main.css">
@section('titulo')
Ferias por categoria
@endsection
@section('content')

  <div class="container">
  <div class="inicio">
      <h1>Ferias Americanas</h1>
      <h2>Elegi la feria segun su ubicacion o los productos que te gusten</h2>
    </div>
    <hr>
     @if($datosFerias->isEmpty())
       <div class="alert alert-danger mx-5" role="alert" >
        <p>Lo Sentimos No Hay Datos para la Categoria seleccionada</p>
       </div>
     @else
      <div class="d-md-flex justify-content-around">
        @foreach ($datosFerias as $feria)
        <div class="feria">
          <div class="header-feria">
            <h3>{{$feria["nombre"]}}</h3>
            <h5>{{$feria["ubicacion"]}}</h5>
            <a target="_blank" href="https://www.google.com/maps/place/{{$feria["ubicacion"]}}" title="Click para ver en el mapa"><img src="/images/mapa.jpeg" alt=""></a>
          {{-- <!---  <img src="./img_user/ // {{ $datosFerias["avatar"]}}" alt="">  ---> --}}
          </div>
          <div class="boton-header">
            <a href="/feria/{{$feria["id"]}}" ><button class="btn btn-light" type="button" name="button">Ver feria!</button></a>
          </div>
          <div class="descripcion">
            {{$feria["descripcion"]}}
          </div>
          <div class="cuerpo-feria">
            @if(!empty($feria["img_nombre"]))
              <img src="/images/{{ $feria["img_nombre"]}}" alt="">
              <img src="/images/{{ $feria["img_nombre"]}}" alt="">
            @else
               <img src="/images/logo_feriate_deffault.png" alt="">
               <img src="/images/logo_feriate_deffault_ii.png" alt="">
            @endif
          </div>
        </div>

               @endforeach
   @endif

 </div>

   </div>
   <div class="links mx-auto">
     {{$datosFerias->links()}}
   </div>
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
@endsection
