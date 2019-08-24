<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
  public $table = "productos";
  public $primaryKey = "id";
  public $guarded = [];


  public function feria(){
    return $this->belongsTo("App\Feria", "feria_id");//El producto pertenece a una feria!!

}

public function categoria(){
  return $this->belongsTo("App\Categoria", "producto_id");//El producto pertenece a una feria!!

}

//relacion Producto/Imagenes : una feria tiene muchas imagenes
  public function imagenes(){
    return $this->hasMany("App\Imagen", "producto_id");
  }


}
