<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
  public $guarded = [];

  public function product(){
    return $this->hasMany("App\Product", "stock_id");
  }

  public function color(){
    return $this->belongsTo("App\Color", "color_id");
  }
}
