    <link rel="stylesheet" href="/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="/css/carrousel.css">
    <div class="container">
    <div class="owl-carousel owl-theme">
      @if(!$datosFerias->isEmpty())
      @foreach ($datosFerias as $feria)
      <div class="item">
        <div class="card" style="width: 15rem;">
          @if(!empty($feria->imagen[0]["nombre"]))
            <img src="/storage/{{$feria->imagen[0]["nombre"]}}" style="width:30vh; height: 30vh" alt="">
          @else
             <img src="/images/logo_feriate_deffault_ii.png" style="width:30vh; height: 40vh" alt="">
          @endif
          <div class="card-body">
            <h5 class="card-title">{{$feria["nombre"]}}</h5>
            {{-- <a target="_blank" href="https://www.google.com/maps/place/{{$feria["ubicacion"]}}">{{$feria["ubicacion"]}}<i class="fas fa-map-marker-alt"></i><a/>
            <p class="card-text">{{$feria["descripcion"]}} </p> --}}
            <a href="/feria/{{$feria["id"]}}" class="btn btn-primary">VER FERIA</a>
          </div>
        </div>
      </div>
        @endforeach
      @else
      @endif
      </div>

      </div>
    <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
<script type="text/javascript" src="../js/owl.carousel.min.js">
</script>
<script type="text/javascript" src="/js/carrousel.js">

</script>
