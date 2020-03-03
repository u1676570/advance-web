<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre_book extends Model
{
    protected $table 		=	'book_genre';
	public    $timestamps   =   false;
	protected $primaryKey 	=	'id';
	protected $fillable 	=	['genreid','bookid'];
}
