<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Authors extends Model
{
    protected $table 		=	'authors';
	protected $primaryKey 	=	'authorid';
	public    $timestamps   =   false;
	protected $fillable 	=	['authorname','authordob'];
}
