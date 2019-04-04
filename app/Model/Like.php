<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = [
        'like_from',
        'post_id',
        'status'
    ];

    public static $rules = [
        'like_from'=>'required',
        'post_id'=>'required',
        'status'=>'required'
    ];
}
