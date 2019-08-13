<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
  public $table = "feriate";
  public $primaryKey = "id";
  public $timestamps = false;
  public $guarded = [];
}
