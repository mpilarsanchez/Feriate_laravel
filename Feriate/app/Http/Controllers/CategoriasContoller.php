<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;

class CategoriasContoller extends Controller
{
  public function index()
  {
    $categorias = Categoria::all();
    //dd($usuarios);
    $vac = compact("categorias");
    return view("home", $vac);
  }
}
