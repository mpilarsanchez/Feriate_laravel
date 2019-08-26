<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;

class CategoriasContoller extends Controller
{
  public function index()
  {
    $categorias = Categoria::all();
    $vac = compact("categorias");
    return view("home", $vac);
  }

  public function traerCategorias()
  {
    $categorias = Categoria::all();
    $vac = compact("categorias");
    return view("cargarProductos", $vac);
  }

}
