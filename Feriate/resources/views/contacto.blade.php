@extends('plantilla')
<link rel="stylesheet" href="./css/main.css">
<link rel="stylesheet" href="./css/contacto.css">
@section('titulo')
Preguntas Frecuentes
@endsection
@section('content')

    <div class="formulario">
    <form>
       <header class="head-form">
          <h2>Contactate con nosotros</h2>
          <p>Dejanos tu mensaje y te respondemos en breve!...</p>
       </header>
       <br>
       <div class="field-set">
         <input class="form-input" id="txt-input" type="email" placeholder="Email" required>
          <br>
        <textarea name="name" rows="8" cols="80" placeholder="Tu comentario"></textarea>
          <br>
          <button class="log-in">Enviar!</button>
       </div>
       <div class="other">
        <p>...o buscanos en nuestras redes sociales!</p>
        </div>
      <div class="redes">
        <i class="fab fa-instagram"></i>
        <i class="fab fa-twitter"></i>
        <i class="fab fa-facebook"></i>
       </div>
    </form>
    </div>
@endsection
