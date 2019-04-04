<?php

namespace App\Http\Controllers\API;
use App\Model\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function addcmt(Request $request)
    {
	    $rules = Comment::$rules;

	    $validator = \Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return response($validator->errors(), 403);
        }
	    $data = $request->all();

        $like = Comment::create($request->all());
    	return response()->json('success comment added', 200);
       // return response()->json(['success' => $afollow[0]->follow_id], 200);
    }
}
