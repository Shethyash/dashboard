<?php

namespace App\Http\Controllers\API;
use Carbon\Carbon;
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
    	$data = Event::where('user_id',$id)
    			->select('event_id','user_id','event_name','event_type','events.a_id','event_time','events.created_at','first_name','last_name','mobile_no','email','address_line1','address_line2','city','state','pin_code','country')
    			->leftjoin('users','events.user_id','users.id')
    			->leftjoin('addresses','events.a_id','addresses.a_id')
    			->orderBy('events.created_at','desc')
    			->get();
    	return response()->json(['event' => $data], 403);
    }	

    public function participantlist($eventid)
    {
    	$data = Event::where('event_id',$eventid)
    			->select('event_id','user_id','event_name','event_type','events.a_id','event_time','events.created_at','first_name','last_name','mobile_no','email','address_line1','address_line2','city','state','pin_code','country')
    			->leftjoin('users','events.user_id','users.id')
    			->leftjoin('addresses','events.a_id','addresses.a_id')
    			->with(['participant'=>function($query){
    				$query->leftjoin('users','participants.user_id','users.id');
    			}])
    			->withCount('participant')
    			->get();
    	return response()->json([$data]);
    }

    public function upcomingevent()
    {
    	$date = Carbon::now();
    	$data = Event::all()->where('event_time','>',$date);
    	return response()->json([$data]);
    }
}
