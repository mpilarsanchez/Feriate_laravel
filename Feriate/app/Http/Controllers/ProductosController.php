<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductosController extends Controller
{
  $productos = Producto::all();
  $vac = compact("productos");
  return view("productos", $vac);
}
}
