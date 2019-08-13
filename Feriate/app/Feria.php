<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feria extends Model
{
  public $table = "feriate";
  public $primaryKey = "id";
  public $timestamps = false;
  public $guarded = [];
}
