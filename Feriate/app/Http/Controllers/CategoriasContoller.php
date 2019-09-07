<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Feria;

class CategoriasContoller extends Controller
{
  public function index()
  {
    $datosFerias = Feria::all();
    $categorias = Categoria::all();
    $vac = compact("categorias","datosFerias");
    return view("home", $vac);
  }

  public function traerCategorias()
  {
    $categorias = Categoria::all();
    $vac = compact("categorias");
    return view("cargarProductos", $vac);
  }

}
