<?php

namespace App\Http\Controllers\API;
use App\Model\Userpic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserpicsController extends Controller
{
    public function index($id)
    {
    	$data = Userpic::where('user_id',$id)
    			->get();
    	return response()->json($data,200);
    }
}
