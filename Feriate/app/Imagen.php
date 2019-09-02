<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    public $table = "imagenes";
    public $timestamps = false;
    public $guarded = [];

    public function feria(){
      return $this->belongsTo("App\Feria", "feria_id");
    }

    public function user(){
      return $this->belongsTo("App\User", "user_id");
    }
}
