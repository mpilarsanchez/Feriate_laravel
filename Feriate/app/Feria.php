<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feria extends Model
{
  public $table = "ferias";
  public $primaryKey = "id";
  public $guarded = [];

  public function imagenes(){
    return $this->hasMany("App\Imagen", "feria_id");
  }
}
