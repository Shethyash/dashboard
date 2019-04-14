<?php

namespace App\Http\Controllers\API;
use Auth;
use App\Model\Event;
use App\Model\Address;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    public function register(Request $request)
    {
		$input = $request->all(); 

		$address= Address::$rules;
    	$a_validator = \Validator::make($request->all(),$address);
    	if ($a_validator->fails()) {
            return response($a_validator1->errors(), 403);
        }
        $rules = Event::$rules;
        $event_validator = \Validator::make($request->all(),$rules);
        if ($event_validator->fails()) {
            return response($event_validator->errors(), 403);
        }
        $data = $request->all();
        $new_address = Address::create($data);
        $data['a_id'] = $new_address->id;

        $event = Event::create($data);

        return response()->json(['address' => $new_address,'event' => $data], 200);
    }

    public function showevent($id)
    {
    	$data = Event::where('user_id',$id)->with('address')->orderBy('created_at','desc')->get();
    	return response()->json(['event' => $data], 403);
    }	
}
