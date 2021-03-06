<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Feria;
use App\Imagen;
use App\Categoria;
use App\Producto;
use Auth;


class FeriasController extends Controller
{

     public function datosFerias($categoria)
     {
      if($categoria == 'Todas'){
         $datosFerias =Feria::orderBy('hasta', 'DESC')->get();
          $categoriaNombre = $categoria;
         $vac = compact("datosFerias", "categoriaNombre");
         return view("ferias", $vac);
      }else{
       $datosCategorias = Categoria::where('cat_nombre', $categoria)->first();
       $categoriaId = $datosCategorias['cat_id'];
       $datosFerias = collect();
       $datosProductos = Producto::where('categoria_id',$categoriaId)->get();
       //investigar como hacer un groupBy feria_id en lugar del if siguiente
       $feria_id ='';
       foreach ($datosProductos as $producto) {
         if($feria_id == $producto['feria_id']){
         }else{
           $datosFerias->push(Feria::where('id',$producto['feria_id'])->get()[0]);
         }
         $feria_id = $producto['feria_id'];
       }
       $categoriaNombre = $categoria;
       $vac = compact("datosFerias", "categoriaNombre");
       return view("ferias", $vac);
     }
   }

   public function misFerias()
   {

     $datosFerias = Feria::where('user_id',Auth::user()->id)->paginate(4);
     $ImagenFeria = Imagen::where('feria_id', '=' , Auth::user()->id)
     ->get()
     ->first();
     $vac = compact("datosFerias", "ImagenFeria");
     return view("misFerias", $vac);

  }
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
     "unique"=>"El campo :attribute se encuentra repetido",
     "file"=>"El archivo tiene que ser ..... jpg.."
     ];

      $this->validate($req, $reglas, $mensajes);


      $feriaNueva = new Feria();
      $feriaImagen = new Imagen();
      $ruta = $req->file("foto_feria")->store("public");
      $nombreArchivo = basename($ruta);

      $feriaNueva->user_id = Auth::user()->id;
      $feriaNueva->nombre = $req["nombre"];
      $feriaNueva->ubicacion = $req["ubicacion"];
      $feriaNueva->desde = $req["desde"];
      $feriaNueva->hasta = $req["hasta"];
      $feriaNueva->descripcion = $req["descripcion"];
      $feriaNueva->activa = 1;
      $feriaNueva->baneado = 0;

//AGREGAR GUARDAR IMAGEN POR DEFECTO
      $feriaNueva->save();
      $feriaImagen->feria_id = $feriaNueva->id;
      $feriaImagen->nombre = $nombreArchivo;
      $feriaImagen->save();
      return redirect("/feria/$feriaNueva->id");
    }

    public function traerFeria($id){
      $feria = Feria::find($id);
      $ImagenFeria = Imagen::where('feria_id', '=' ,$id)
      ->get()
      ->first();
      $vac = compact("feria", "ImagenFeria");
      return view("/feria", $vac);
    }

      //return "Esta es mi feria id: $id";



    public function edit($id){
     $feriaEdit = Feria::find($id);
     $datos_productos = Producto::where('feria_id',$id)
     ->get();
     $vac = compact("feriaEdit", "datos_productos");
    return view("editarFeria", $vac);
    }


  public function update(Request $req, $id){
    //VALIDACION
      $reglas =[
        //del lado izquierdo campos del formulario que quiero validar(tenemos que utilizar el mismo name del input formulario)
        "nombre"=> "string|min:3",
        "ubicacion"=> "string|min:3",
        "desde"=>"date",
        "hasta"=>"date",
        "descripcion"=>"string|min:10"
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
    //  $id = $req["id"];
      $updatedFeria = Feria::find($id);
      $updatedFeria->user_id = Auth::user()->id;
      $updatedFeria->nombre = $req["nombre"];
      $updatedFeria->ubicacion = $req["ubicacion"];
      $updatedFeria->desde = $req["desde"];
      $updatedFeria->hasta = $req["hasta"];
      $updatedFeria->descripcion= $req["descripcion"];

      $updatedFeria->save();
//CLAUSULA IF NO HACE FALTA SI SE AGREGA LA IMAGEN POR DEFECTO
      if ($req["imagen"]== null || $req["imagen"] == '') {


      }else{
      $feriaImagen = Imagen::where('feria_id', '=' ,$id)
      ->get()
      ->first();
      $ruta = $req->file("imagen")->store("public");
      $nombreArchivo = basename($ruta);


      $feriaImagen->feria_id = $id;
      $feriaImagen->nombre = $nombreArchivo;
      $feriaImagen->save();

    }
    return redirect("/feria/$id");
  }

     public function borrar(Request $req, $id){
       $feriaImagen = Imagen::where('feria_id', '=' ,$id)
       ->get()
       ->first();

       $feriaImagen->feria_id = $id;
       $feriaImagen->delete();

       $deletedFeria = Feria::find($id);
       $deletedFeria->delete();

     return redirect("/");
     }



}
