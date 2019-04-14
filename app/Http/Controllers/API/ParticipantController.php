<?php

namespace App\Http\Controllers\API;
use App\Model\Participant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ParticipantController extends Controller
{
    public function store(Request $request)
    {
    	$rule = Participant::$rules;
    	$part = \Validator::make($request->all(),$rule);
        if ($part->fails()) {
            return response($part->errors(), 403);
        }

        $data = Participant::create($request->all());
        if($data)
        {
	        return response()->json('susseccfull register for event', 200);
        }
        else
        {
	        return response()->json('Not register', 200);
        }
    }

    public function accept(Request $request)
    {
    	$data = Participant::where('user_id',$request->user_id)
    			->where('event_id',$request->event_id)
    			->update(['accepted'=>1]);
    	return response($data);
    }
}
