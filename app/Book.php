<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table 		=	'books';
	protected $primaryKey 	=	'bookid';
	public    $timestamps   =   false;
	protected $fillable 	=	['title','isbn','language','pages','publishdate','authorid'];
}
