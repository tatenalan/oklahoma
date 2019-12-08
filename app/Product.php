<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  public $guarded = [];

  public function genre(){
    return $this->belongsTo("App\Genre", "genre_id"); // Recordar poner App con A mayuscula
  }

  
}
