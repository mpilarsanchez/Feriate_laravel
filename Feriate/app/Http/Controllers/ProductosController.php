<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Feria;
use App\Imagen;
use App\Categoria;
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

  public function edit($id){
   $productoEdit = Producto::find($id);
   $categorias = $this->getCategorias();
   $vac = compact("productoEdit","categorias");
  return view("editarProducto", $vac);
  }

   public function getCategorias(){
      $categorias = Categoria::all();
      return $categorias;
   }

   public function update(Request $req, $id){
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

     $productoNuevo = Producto::find($id);
     $productoImagen = Imagen::where('producto_id', '=' ,$id)
     ->get()
     ->first();
     $ruta = $req->file("foto_producto")->store("public");
     $nombreArchivo = basename($ruta);

     $productoNuevo->user_id = Auth::user()->id;
     $productoNuevo->feria_id = $id;
     $productoNuevo->nombre = $req["nombre"];
     $productoNuevo->categoria_id = $req["categoria"];
     $productoNuevo->precio = $req["precio"];
     $productoNuevo->cantidad = $req["cantidad"];
     $productoNuevo->descripcion = $req["descripcion"];
     $productoNuevo->talle = $req["talle"];
     $productoNuevo->marca = $req["marca"];
     $productoNuevo->estado= $req["estado"];
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

   public function borrar(Request $req, $id){
     $productoImagen = Imagen::where('producto_id', '=' ,$id)
     ->get()
     ->first();

     $productoImagen->producto_id = $id;
     $productoImagen->delete();

     $deletedProducto = Producto::find($id);
     $deletedProducto->delete();
     $feria_id = $req["feria_id"];
     return redirect("/feria/$feria_id");
   }

   public function datosProductos($categoria)
   {

     $datosCategorias = Categoria::where('cat_nombre', $categoria)->first();
     $categoriaId = $datosCategorias['cat_id'];
     $datosProductos = Producto::where('categoria_id', $categoriaId)->paginate(6);
     $categoria = $categoria;
     $vac = compact("datosProductos","categoria");
     return view("productos", $vac);

 }

   public function search(Request $req){
      $datosProductos = Producto::where('nombre', 'like', '%'.$req["search"].'%')->paginate(1);
      $busqueda = $req["search"];
      $vac = compact("datosProductos", "busqueda");
      return view("productos", $vac);
 }
}
