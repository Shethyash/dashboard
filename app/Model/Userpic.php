<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Userpic extends Model
{
    protected $fillable = [
    	'user_id',
    	'status',
    	'file',
    	'type'
    ];

    public static $rules = [
    	'file' => 'required',
        'file.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    ];
}
