<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
  //public $table = "feriate";
  public $primaryKey = "cat_id";
  //public $timestamps = ;
  public $guarded = [];

  //relacion Categoria/Productos : una categoria tiene muchos productos
    public function producto(){
      return $this->hasMany("App\Producto", "categoria_id");
    }

}
