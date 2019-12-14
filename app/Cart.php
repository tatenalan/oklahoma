<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
  public $guarded = [];

  public function user(){
    return $this->belongsTo("App\User", "user_id");
  }

  public function product(){
    return $this->belongsTo("App\User", "product_id");
  }

}
