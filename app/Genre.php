<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $table 		=	'genre';
	protected $primaryKey 	=	'genreid';
	public    $timestamps   =   false;
	protected $fillable 	=	['name','description'];
}
