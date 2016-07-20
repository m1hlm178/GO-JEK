<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class visitor extends Model
{
	protected $table = 'visitor';
    public $incrementing = false; 
	protected $fillable = [
       'id','name','email','phone','occupation'
    ];
}
