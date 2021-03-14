<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    //
    // protected $table = "cars";
    // public $timestamps = true;

    protected $fillable = [
		'id','name'
	];
}
