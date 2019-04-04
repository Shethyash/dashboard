<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    protected $fillable = [
    	'follow_to',
    	'follow_from',
    	'follow_active'
    ];

    public static $rules = [
        'follow_to'=>'required',
        'follow_from'=>'required',
        'follow_active'=>'required'
    ];
}
