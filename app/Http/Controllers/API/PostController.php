<?php

namespace App\Http\Controllers\API;
use App\Model\Post;
use App\User;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function showpost($id)
    {
        $data = Post::where('user_id',$id)
                ->with(['like'=> function($query){
                    $query->select('like_id','post_id','like_from','status');
                    $query->orderBy('created_at','desc');
                }])
                ->withCount('like')
                ->with(['comment' => function($query){
                    $query->select('cmt_id','post_id','cmt_from','cmt_desc','cmt_status');
                    $query->orderBy('created_at','desc');
                }])
                ->withCount('comment')
                ->with('postfile')
                ->get();
        return $data;
    }

    public function showuserpost($id)
    {
        $data = $this->showpost($id);
    	if(count($data)==0)
    	{
    		return response()->json(['msg'=>'not found any data'],404);
    	}
    	return response()->json(['posts' => $data,'msg'=>'success'],200);
    }

    public function showuserfollowpost($id)
    {
    	$follow = \DB::table('followers')->select('follow_to')->where('follow_from',$id)->get();
        $data = array();
    	foreach ($follow as $key) {
            array_push($data,$this->showpost($key->follow_to));
    	}
    	return response()->json(['posts' => $data,'msg'=>'success'],200);
    }
}
