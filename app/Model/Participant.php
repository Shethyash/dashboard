<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $fillable = [
    	'event_id',
    	'user_id',
    	'status',
    	'accepted'
    ]; 

    public static $rules = [
    	'event_id' => 'required',
    	'user_id' => 'required',
    	'status' => 'required'
    ];
}
