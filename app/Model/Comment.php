<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
    	'post_id',
    	'cmt_from',
    	'cmt_desc',
    	'cmt_status'
    ];

    public static $rules = [
        'post_id'=>'required',
        'cmt_from'=>'required',
        'cmt_desc'=>'required',
        'cmt_status'=>'required'
    ];
}
