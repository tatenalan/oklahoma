<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
  public $guarded = [];

  public function users(){
    return $this->hasMany("App\User", "cart_id");
  }
  
}
