<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
   //public $table = "feriate_db";
    public $primaryKey = "id";
    public $timestamps = false;
    public $guarded = [];

    public function getNombreCompleto(){
      //dd($this);
      return $this->us_nombre . " " . $this->us_apellido;
    }
}
