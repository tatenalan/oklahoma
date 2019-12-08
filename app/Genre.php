<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
  public $guarded = [];

  public function products(){
    return $this->hasMany("App\Product", "genre_id"); // Recordar poner App con A mayuscula!!
  }

}
