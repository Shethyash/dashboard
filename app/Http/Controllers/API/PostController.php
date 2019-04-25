<?php

namespace App\Http\Controllers\API;
use App\Model\Post;
use App\Model\Postfile;
use App\User;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function create(Request $request)
    {
        $prule = Post::$rules;
        $validator = \Validator::make($request->all(),$prule);
        if ($validator->fails()) {
            return response($validator->errors(), 403);
        }

        $frule = Postfile::$rules;
        $validator = \Validator::make($request->all(),$frule);
        if ($validator->fails()) {
            return response($validator->errors(), 403);
        }

        $new = Post::create($request->all());
        $name = $request->file('file')->getClientOriginalName();
        $ext = $request->file->extension();

        if($new)
        {
            $request->file->move(public_path().'/uploads/postfiles', $name);
            $pfile = Postfile::create(['post_id' => $new->id,'file_path' => $name,'file_type'=>$ext]);
        }
        
        return response()->json('Post created ');
    }
    public function showpost($id)
    {
        $data = Post::where('posts.user_id',$id)
                ->select('post_id','posts.user_id','desc_title','desc_content','posts.created_at',
                'first_name','last_name','file')
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
                ->leftjoin('users','users.id','posts.user_id')
                ->leftJoin('userpics', function($join) {
                  $join->on('posts.user_id', '=', 'userpics.user_id');
                  $join->where('userpics.status',1);
                })
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
    	return response()->json($data);
    }

    public function showuserfollowpost($id)
    {
    	$follow = \DB::table('followers')->select('follow_to')->where('follow_from',$id)->get();
        $data = array();
    	foreach ($follow as $key) {
            array_push($data,$this->showpost($key->follow_to));
    	}
    	return response()->json($data);
    }

    public function allpost()
    {
        $data = Post::select('post_id','posts.user_id','desc_title','desc_content','posts.created_at',
                'first_name','last_name','file')
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
                ->leftjoin('users','users.id','posts.user_id')
                ->leftJoin('userpics', function($join) {
                  $join->on('posts.user_id', '=', 'userpics.user_id');
                  $join->where('status',1);
                })
                // ->leftjoin('userpics','userpics.user_id','users.id')->where('status',1)
                ->get();
        return response()->json($data);
    }
}
