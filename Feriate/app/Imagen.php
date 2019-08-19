<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    public $table = "imagenes";
    public $timestamps = false;
    public $guardes = [];

    public function feria(){
      return $this->belongsTo("App\Feria", "feria_id");
    }
}
