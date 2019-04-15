<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
    	'user_id',
    	'event_name',
    	'event_type',
    	'event_status',
    	'event_time',
    	'event_participant',
    	'a_id'
    ];

    public static $rules = [
    	'event_name' => 'required',
        'event_status' => 'required', 
        'event_type' => 'required',
    ];

    public function address()
    {
    	return $this->hasOne('App\Model\Address','a_id','a_id');
    }

    public function create()
    {
    	return $this->hasOne('App\User','id','user_id');
    }

    public function participant()
    {
    	return $this->hasMany('App\Model\Participant','event_id','event_id');
    }
}
