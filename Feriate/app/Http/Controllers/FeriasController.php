<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Feria;
use App\Imagen;
use Auth;


class FeriasController extends Controller
{
    public function crear(Request $req){
   //VALIDACION
     $reglas =[
       //del lado izquierdo campos del formulario que quiero validar(tenemos que utilizar el mismo name del input formulario)
       "nombre"=> "string|min:3",
       "ubicacion"=> "string|min:3",
       "desde"=>"date",
       "hasta"=>"date",
       "descripcion"=>"string|min:10",
       "foto_feria"=>"file"
     ];

     $mensajes=[
     "string"=>"El campo :attribute tiene que ser un texto",
     "min"=>"El campo :attribute tiene un minimo de :min",
     "max"=>"El campo :attribute tiene un maximo de :max",
     "numeric"=>"El campo :attribute debe ser un numero",
     "date"=> "El campo :attribute debe ser una fecha",
     "integer"=>"El campo :attribute debe ser un numero entero",
     "unique"=>"El campo :attribute se encuentra repetido"
     ];

      $this->validate($req, $reglas, $mensajes);


      $feriaNueva = new Feria();
      $feriaImagen = new Imagen();
      $ruta = $req->file("foto_feria")->store("public");
      $nombreArchivo = basename($ruta);

      $feriaNueva->user_id = Auth::user()->id;;
      $feriaNueva->nombre = $req["nombre"];
      $feriaNueva->ubicacion = $req["ubicacion"];
      $feriaNueva->desde = $req["desde"];
      $feriaNueva->hasta = $req["hasta"];
      $feriaNueva->descripcion = $req["descripcion"];
      $feriaNueva->activa = 1;
      $feriaNueva->baneado = 0;


      $feriaNueva->save();
      $feriaImagen->feria_id = $feriaNueva->id;
      $feriaImagen->nombre = $nombreArchivo;
      $feriaImagen->save();
      return redirect("/feria/$feriaNueva->id");
    }

    public function traerFeria($id){
      return "Esta es mi feria id: $id";
    }
}
