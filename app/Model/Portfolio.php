<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable = [
    	'user_id',
    	'cat_id',
    	'profession',
    	'birth_date',
    	'achievements',
    	'a_id'
    ];

    public static $rules = [
    	'user_id' => 'required',
    	'cat_id' => 'required',
    	// 'birth_date' => 'required|date'
    ];

    public function address()
    {
        return $this->hasOne('App\Model\Address','a_id','a_id');
    }
}
