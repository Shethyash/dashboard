<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
    	'address_line1',
    	'address_line2',
    	'city',
    	'state',
    	'pin_code',
    	'country'
    ];

    public static $rules = [
    	'address_line1' => 'required',
    	'city' => 'required',
    	'state' => 'required',
    	'pin_code' => 'required',
    	'country' => 'required'
    ];
}
