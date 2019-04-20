<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Userpic extends Model
{
    protected $fillable = [
    	'user_id',
    	'status',
    	'file'
    ];
}
