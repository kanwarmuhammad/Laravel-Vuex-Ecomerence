<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categoery extends Model
{
    //
  protected $fillable = [
  'id','name'
  ];

  public function products()
  {
    return $this->hasMany('App\product');
  }
}
