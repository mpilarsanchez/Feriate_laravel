@extends('plantilla')
  <link rel="stylesheet" href="/css/index.css">
  <link rel="stylesheet" href="../css/footer.css">
  <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/ferias.css">
@section('titulo')
Mis Ferias
@endsection
@section('content')

  <div class="container">
    <div class="inicio">
      <h1>Mis Ferias</h1>
    </div>
    <hr>
     @if($datosFerias->isEmpty())
       <div class="alert alert-danger mx-5" role="alert" >
        <p>todavia No tenes ninguna Feria </p>
        <a href="/crearFeria"><button id="boton" type="button" name="button" class="btn btn-dark">Crea tu feria!!!!</button></a>
       </div>
     @else
    <main>
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
@endsection
