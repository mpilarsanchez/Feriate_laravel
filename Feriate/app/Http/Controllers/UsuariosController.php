<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;

class UsuariosController extends Controller
{
  public function listado()
  {
    //dd ("Llegue bien!!!");
    $usuarios = Usuario::all();
    //dd($usuarios);
    $vac = compact("usuarios");
    return view("listadoUsuarios", $vac);
  }

}
