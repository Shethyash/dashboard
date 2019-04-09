<?php

namespace App\Http\Controllers\API;
use App\Model\Post;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function showuserpost($id)
    {
    	$data = Post::where('user_id',$id)->get();
    	if(count($data)==0)
    	{
    		return response()->json(['msg'=>'not found any data'],404);
    	}
    	return response()->json(['posts' => $data,'msg'=>'success'],200);
    }

    // public function showuserfollowpost($id)
    // {
    // 	$follow = \DB::table('followers')->select('follow_to')->where('follow_from',$id)->get();
    // 	$temp = []
    // 	foreach ($follow as $key) {
    // 		array_push($temp,$key->follow_to);
    // 	}
    // 	print_r($temp);
    // 	return ;
    // 	$data = \DB::table('posts')->whereIn('user_id',$follow);
    // 	return response()->json(['posts' => $data,'msg'=>'success'],200);
    // }
}
