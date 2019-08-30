@extends('plantilla')
<link rel="stylesheet" href="./css/main.css">
<link rel="stylesheet" href="./css/registro.css">
@section('titulo')
Register
@endsection
@section('content')
<body>
  <div class="container">
    <h1 class="mt-3">Registrate!</h1>
        <form method="post" action="{{ route('register') }}">
          @csrf
      <div class="field-set">
        <div class="form-input mb-3 mt-3">
          <label for="nombre"> Nombre <span>*</span></label>
          <input type="nombre" class="form-control @error('nombre') is-invalid @enderror" id="nombre" placeholder="nombre" name="nombre" value="{{ old('nombre') }}" required autocomplete="nombre" autofocus>
            @error('nombre')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-input mb-3">
          <label for="apellido"> Apellido <span>*</span></label>
          <input type="apellido" class="form-control" id="apellido" placeholder="apellido" name="apellido" value="{{ old('apellido') }}" required autocomplete="apellido" autofocus>
          @error('apellido')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>
        <div class="form-input mb-3">
          <label for="email"> Email <span>*</span></label>
          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-input mb-3">
          <label for="password">Contraseña <span>*</span></label>
          <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" name="password" required autocomplete="new-password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-input mb-3">
          <label for="password-confirm">Confirmar Contraseña<span>*</span></label>
          <input type="password" class="form-control" id="password-confirm" placeholder="Password" name="password_confirmation" required autocomplete="new-password">
        </div>
      </div>
      <div class="form-group form-check">
      <input type="checkbox" class="form-check-input" id="notificaciones" name="notificaciones">
      <label class="form-check-label" for="notificaciones">Quiero recibir novedades de Feriate!</label>
      </div>
      <div class="form-group form-check">
      <input type="checkbox" class="form-check-input" id="terminos_condiciones" placeholder="aceptar_terminos" name="aceptar_terminos" required>
      <label class="form-check-label" for="terminos_condiciones">Acepto <a href="./terminos_condiciones.php">Terminos y Condiciones</a></label>
      </div>
      <button class="btn btn-primary btn-lg" type="submit" >Registrarme</button>
    </form>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  @endsection
