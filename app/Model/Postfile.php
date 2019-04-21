<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Postfile extends Model
{
    protected $fillable = [
    	'post_id',
    	'file_path',
    	'file_type'
    ];

    public static $rules = [
    	'post_id' => 'required',
    	'file' => 'required',
        'file.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    ];
}
