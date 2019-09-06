@extends('plantilla')
<link rel="stylesheet" href="../css/main.css">
<link rel="stylesheet" href="../css/perfil.css">
@section('titulo')
Perfil
@endsection
@section('content')
  <main>
    <div class="info">
          <div class="img">
            @if (Auth::check())
              <img src="/storage/{{$usuario->imagen[0]["nombre"]}}" alt="img-thumbnail"> 
            @else
            <img src="/images/userdefault.jpg" alt="" class="img-thumbnail">
            @endif
   </div>
    <div class="datos">
        <h1>@if((Auth::check()))
          <h2 class="title">Bienvenido {{$usuario->nombre}}</h2>
            @endif</h1>
            @if ((Auth::check()))
              <h4>{{$usuario->email}}</h4>
            @endif
            <h6>Usuario activo desde {{$usuario->created_at}}</h4></h6>
            <form class="" action="/guardarPerfil/{{$usuario->id}}" method="post" enctype="multipart/form-data">
              {{method_field('put')}}
              {{csrf_field()}}
              <input type="text" name="direccion" value="{{$usuario->direccion}}" placeholder="direccion">
              {{-- /!falta localidad y pais/ --}}
              <input type="text" name="tel" value="{{$usuario->tel}}" placeholder="telefono">
              <input type="file" name="foto_perfil" class="foto_perfil" >
              <br>
              <button  type="submit" name="button">Guardar</button>
            </form>
              <form id="eliminarUsuario" method="post" action="/borrarUsuario/{{$usuario->id}}" enctype="multipart/form-data">
              {{method_field('delete')}}
               {{csrf_field()}}
              <button type="submit" id="eliminar"><i class="fa fa-cog" aria-hidden="true"></i> Eliminar Usuario!</a>
              </button>
              </form>
              <!---dialogo que es usado por jquery ui , aparece oculto por defecto -->
              <div id="dialog-confirm" title="Eliminar Usuario?" style="display:none">
                <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>Esta seguro que desea eliminar su cuenta?</p>
                <p><span  style="float:left; margin:15px 15px 20px 0;"></span> Todos las ferias y productos creados tambien se eliminaran.</p>
              </div>
     </div>
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="https://code.jquery.com/ui/1.11.1/jquery-ui.min.js"></script>
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css" />
  <script src="/js/perfil.js"></script>

@endsection
