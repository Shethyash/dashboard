<?php

namespace App\Http\Controllers\API;
use App\Model\Follower;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class FollowerController extends Controller
{
    public function addfollow(Request $request)
    {
    	$rules = Follower::$rules;
	    $validator = \Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return response($validator->errors(), 403);
        }

	    $param = $request->all();
    	$afollow = Follower::select('follow_id')->where('follow_to',$param['follow_to'])->where('follow_from',$param['follow_from'])->get();
        if(!empty($afollow[0]->follow_id))
        {
        	$up = DB::table('followers')
        		->where('follow_id',$afollow[0]->follow_id)
        		->update(['follow_active'=>$param['follow_active']]);
        	return response()->json('success update', 200);
        } 
        else
        {
	        $like = Follower::create($request->all());
        	return response()->json('success added', 200);
        }
       // return response()->json(['success' => $afollow[0]->follow_id], 200);
    }
}
