<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class master extends Model
{
	protected $table = 'master';
	public $timestamps = false;
	protected $fillable = [
       'idmaster','nama','jenis'
    ];
}
