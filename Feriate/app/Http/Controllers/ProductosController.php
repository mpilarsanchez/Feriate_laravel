<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Feria;
use App\Imagen;
use Auth;

class ProductosController extends Controller
{

public function cargar(Request $req){
//VALIDACION

 $reglas =[

   "nombre"=> "string|min:3",
   "precio"=> "numeric",
   "cantidad"=>"numeric",
   "descripcion"=>"string|min:10",
   "foto_producto"=>"file"
 ];

 $mensajes=[
 "string"=>"El campo :attribute tiene que ser un texto",
 "min"=>"El campo :attribute tiene un minimo de :min",
 "max"=>"El campo :attribute tiene un maximo de :max",
 "numeric"=>"El campo :attribute debe ser un numero",
 "date"=> "El campo :attribute debe ser una fecha",
 "integer"=>"El campo :attribute debe ser un numero entero",
 "unique"=>"El campo :attribute se encuentra repetido",
 "file"=>"El archivo tiene que ser ..... jpg.."
 ];

  $this->validate($req, $reglas, $mensajes);

  $productoNuevo = new Producto();
  $productoImagen = new Imagen();
  $ruta = $req->file("foto_producto")->store("public");
  $nombreArchivo = basename($ruta);

  $productoNuevo->user_id = Auth::user()->id;
  $productoNuevo->feria_id = $req->route('id');
  $productoNuevo->nombre = $req["nombre"];
  $productoNuevo->categoria_id = $req["categoria"];
  $productoNuevo->precio = $req["precio"];
  $productoNuevo->cantidad = $req["cantidad"];
  $productoNuevo->descripcion = $req["descripcion"];
  $productoNuevo->baneado = 0;
  $productoNuevo->destino = 0;
//AGREGAR GUARDAR IMAGEN POR DEFECTO
  $productoNuevo->save();
  $productoImagen->producto_id = $productoNuevo->id;
  $productoImagen->nombre = $nombreArchivo;
  $productoImagen->save();
  $id = $req->route('id');
  return redirect("/feria/$id");
}

}
