<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  public $guarded = [];

  public function genre(){
    return $this->belongsTo("App\Genre", "genre_id"); // Recordar poner App con A mayuscula
  }

  public function images(){
    return $this->hasMany("App\Image", "product_id"); // Recordar poner App con A mayuscula
  }

  public function category(){
    return $this->belongsTo("App\Category", "category_id");
  }

  public function stock(){
    return $this->belongsTo("App\Stock", "stock_id");
  }


}
