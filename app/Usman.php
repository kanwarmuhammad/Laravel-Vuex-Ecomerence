<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usman extends Model
{
    //
    public $table = "usman";
    protected $fillable = [
		'id','name','email','password','gender'
	];
}
