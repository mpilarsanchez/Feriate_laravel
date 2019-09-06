@extends('plantilla')
  <link rel="stylesheet" href="/css/index.css">
  <link rel="stylesheet" href="/css/main.css">
@section('titulo')
Ferias por categoria
@endsection
@section('content')

  <div class="container">
     @if($datosFerias->isEmpty())
       <div class="alert alert-danger mx-5" role="alert" >
        <p>Lo Sentimos No Hay Datos para la Categoria seleccionada</p>
       </div>
     @else
       <div class=" row d-md-flex justify-content-around">
        @foreach ($datosFerias as $feria)
        <div class="feria col-md-4 col-lg-3">
          <div class="cuerpo-feria">
            @if(!empty($feria->imagen[0]["nombre"]))
              <img src="/storage/{{$feria->imagen[0]["nombre"]}}" alt="">
            @else
               <img src="/images/logo_feriate_deffault_ii.png" alt="">
            @endif
          </div>
          <div class="header-feria">
             <h5><a target="_blank" href="https://www.google.com/maps/place/{{$feria["ubicacion"]}}"><i class="fas fa-map-marker-alt"></i> <a/>  {{$feria["ubicacion"]}}</h5>
            <h3>{{$feria["nombre"]}}</h3>


          {{-- <!---  <img src="./img_user/ // {{ $datosFerias["avatar"]}}" alt="">  ---> --}}
          <div class="descripcion">
            <h5>{{$feria["descripcion"]}}</h5>
          </div>
          <div class="boton-header">
            <a href="/feria/{{$feria["id"]}}" ><button class="btn btn-light mt-3" type="button" name="button">Ver feria!</button></a>
          </div>
          </div>

        </div>
       @endforeach
     @endif

    </div>

     <?php // IDEA:{{$datosFerias->links()}}  ?>
   </div>

   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
@endsection
