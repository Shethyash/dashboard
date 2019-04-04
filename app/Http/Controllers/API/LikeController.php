<?php

namespace App\Http\Controllers\API;

use App\Model\Like;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class LikeController extends Controller
{
    public function addlike(Request $request)
    {
    	$rules = Like::$rules;
        $validator = \Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return response($validator->errors(), 403);
        }
        
	    $param = $request->all();
    	$alike = Like::select('like_id')->where('like_from',$param['like_from'])->where('post_id',$param['post_id'])->get();
        if(!empty($alike[0]->like_id))
        {
        	$up = DB::table('likes')
        		->where('like_id',$alike[0]->like_id)
        		->update(['status'=>$param['status']]);
        	return response()->json('success update', 200);
        } else
        {
	        $like = Like::create($request->all());
        	return response()->json('success added', 200);
        }
       // return response()->json(['success' => $alike[0]->like_id], 200);
    }

}
