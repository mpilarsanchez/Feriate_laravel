<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Imagen;

class UsersController extends Controller
{

  public function listado()
  {
    $usuarios = Usuario::all();
    $vac = compact("usuarios");
    return view("listadoUsuarios", $vac);
  }

  public function traerUsuario(){
    $usuario = User::find( Auth::user()->id);
    $vac = compact("usuario");
    return view("perfil", $vac);
  }

  public function editUsuario(){
    $usuario = User::find( Auth::user()->id);
    $vac = compact("usuario");
    return view("editarPerfil", $vac);
  }

  public function update(Request $req, $id){
  //VALIDACION

   $reglas =[

     'direccion' => 'string|max:255',
     'tel' => 'numeric',
     "foto_perfil"=>"file"
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

    $usuarioActualizado = User::find($id);

    $userImagen = Imagen::where('user_id', '=' ,$id)
    ->get()
    ->first();
    if(!empty($req["foto_perfil"])){
      if($userImagen == null){
        $userImagen = new Imagen();
        $ruta = $req->file("foto_perfil")->store("public");
        $nombreArchivo = basename($ruta);
        $userImagen->user_id = $usuarioActualizado->id;
        $userImagen->nombre = $nombreArchivo;
        $userImagen->save();
      }else{
        $ruta = $req->file("foto_perfil")->store("public");
        $nombreArchivo = basename($ruta);
        $userImagen->user_id = $usuarioActualizado->id;
        $userImagen->nombre = $nombreArchivo;
        $userImagen->save();
      }
  }
    $usuarioActualizado->direccion = $req["direccion"];
    $usuarioActualizado->tel = $req["tel"];

  //AGREGAR GUARDAR IMAGEN POR DEFECTO
    $usuarioActualizado->save();
    return redirect("/perfil");
  }

  public function borrar(Request $req, $id){
    $userImagen = Imagen::where('user_id', '=' ,$id)
    ->get()
    ->first();
    if($userImagen == null){
      $deletedUser = User::find($id);
      $deletedUser->delete();

    }else{
      $userImagen->user_id = $id;
      $userImagen->delete();

      $deletedUser = User::find($id);
      $deletedUser->delete();
  }
  return redirect("home");
}
}
