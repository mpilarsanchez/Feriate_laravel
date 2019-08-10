@extends('plantilla')
@section('titulo')
  Listado Usuarios
@endsection
@section("principal")
  <h1>Usuarios Feriate</h1>
 <ul>
   @foreach ($usuarios as $usuario)
     <li>
       <h2>{{$usuario->getNombreCompleto()}}</h2>
     </li>
   @endforeach
 </ul>
@endsection
