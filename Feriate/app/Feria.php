<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feria extends Model
{
  public $table = "ferias";
  public $primaryKey = "id";
  public $guarded = [];


//relacion Feria/Imagenes : una feria tiene muchas imagenes
  public function imagen(){
    return $this->hasMany("App\Imagen", "feria_id");
  }

  //relacion Feria/Usuario : una feria pertenece a un usuario
  public function propietario(){
    return $this->belongsTo("App\User", "user_id");                                                                       //la clave foranea (genre_id)
  }

//relacion Feria/Productos
public function productos(){
  return $this->hasMany("App\Producto", "feria_id");
}


}
