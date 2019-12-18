<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use App\User;
class Cart extends Model
{
  public $guarded = [];

  public function products()
    {
      return $this->belongsTo(Product::class, 'product_id', 'id');
    }

}
