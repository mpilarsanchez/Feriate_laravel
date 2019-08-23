<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feria extends Model
{
  public $table = "ferias";
  public $primaryKey = "id";
  public $guarded = [];

  
//relacion Feria/Imagenes : una feria tiene muchas imagenes
  public function imagenes(){
    return $this->hasMany("App\Imagen", "feria_id");
  }

  //relacion Feria/Usuario : una feria pertenece a un usuario
  public function duenio(){
    return $this->belongsTo("App\Usuario", "user_id");//lleva 2 parametros 1) que tipo de objeto debe devolver el metodo y
                                                                         //la clave foranea (genre_id)
  }

//relacion Feria/Productos
public function productos(){
  return $this->hasMany("App\Producto", "feria_id");
}

}
