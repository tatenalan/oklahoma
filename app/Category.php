<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  public $guarded = [];

  public function productsByCategory(){
    return $this->hasMany("App\Product", "category_id");
  }
}
