<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
  public $guarded = [];

  public function stock(){
    return $this->hasMany("App\Stock","color_id");
  }
}
