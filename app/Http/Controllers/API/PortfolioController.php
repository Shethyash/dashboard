<?php

namespace App\Http\Controllers\API;

use App\Model\Portfolio;
use App\Model\Address;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PortfolioController extends Controller
{
    public function store(Request $request)
    {
    	$address= Address::$rules;
    	$a_validator = \Validator::make($request->all(),$address);
    	if ($a_validator->fails()) {
            return response($a_validator1->errors(), 403);
        }
        $rules = Portfolio::$rules;
        $pf_validator = \Validator::make($request->all(),$rules);
        if ($pf_validator->fails()) {
            return response($pf_validator->errors(), 403);
        }
        $data = $request->all();
        $new_address = Address::create($data);
        $data['a_id'] = $new_address->id;

        $new_pf = Portfolio::create($data);

        return response()->json(['address' => $new_address,'pf' => $new_pf], 200);

        // return response()->json(['address' => $data], 200);
    }

    public function show($id)
    {
    	
    }
}
