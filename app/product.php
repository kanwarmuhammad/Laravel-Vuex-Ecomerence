<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    //
    protected $fillable = [
        'id','title','price','quantity','description','image','categoery_id'
    ];

    public function categoeries()
    {
    return $this->belongsTo('App\categoery');
    }
}
