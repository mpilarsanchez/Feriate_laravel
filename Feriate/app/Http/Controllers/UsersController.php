<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UsersController extends Controller
{

  public function listado()
  {
    $usuarios = Usuario::all();
    $vac = compact("usuarios");
    return view("listadoUsuarios", $vac);
  }


  public function traerUsuario(){
    $usuario = User::find( Auth::user()->id);
    $vac = compact("usuario");
    return view("perfil", $vac);
  }
}
