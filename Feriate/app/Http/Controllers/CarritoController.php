<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carrito;
use App\Producto;
use App\Categoria;
use Auth;

class CarritoController extends Controller
{
  public function agregar(Request $req){

  $producto = New Carrito();
  $producto->producto_id =  $req["id"];
  $producto->user_id = Auth::user()->id;
  $producto->save();
  return redirect ("carrito");
  }

  public function cargarCarrito(){

    $productosCarrito = Carrito::where('user_id',Auth::user()->id)
    ->get();
    if($productosCarrito->isEmpty()){
      $datosProductos=[];
      $vac = compact("datosProductos");
      return view("carrito", $vac);
    }else{

      $id = $productosCarrito[0]["producto_id"];
      $datosProductos =  Producto::where('id','=', $id)
      ->get();
      $categoria = Categoria::where('cat_id',$datosProductos[0]["categoria_id"])
      ->get();
      $vac = compact("datosProductos",'categoria');
      return view("carrito", $vac);
      }
  }

  public function quitar(Request $req){
       $producto = Carrito::where('user_id',Auth::user()->id)
                   -> where('producto_id', $req["id"] )
                   ->get()
                   ->first();
       $producto->delete();
      return redirect ("carrito");
  }
}
