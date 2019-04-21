<?php  

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User; 
use App\Model\Userpic;
use Illuminate\Support\Facades\Auth; 
use Validator;

class UserController extends Controller
{
    public $successStatus = 200;
/** 
     * login api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function login(){ 
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('MyApp')-> accessToken;
            return response()->json(['success' => $success,'user' => $user], $this-> successStatus);
            // $data = User::where('id',$user->id)->with(['portfolio.address'])->get(); 
            // return response()->json(['success' => $success,'user' => $data], $this-> successStatus);
        } 
        else{ 
            return response()->json(['error'=>'Unauthorised'], 401); 
        } 
    }
	/** 
     * Register api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function register(Request $request) 
    { 
        $validator = Validator::make($request->all(), [ 
            'first_name' => 'required|regex:/(^([a-zA-z]+)(\d+)?$)/u|min:3',
            'last_name' => 'required|regex:/(^([a-zA-z]+)(\d+)?$)/u|min:3', 
            'email' => 'required|email|unique:users,email',
            'mobile_no'=>'required|min:10|numeric', 
            'password' => 'required|min:8', 
            'c_password' => 'required|same:password',
            // 'activated' => 'required',
            // 'role_id' => 'required'
        ]);
		if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);            
        }
		$input = $request->all(); 
        $input['password'] = bcrypt($input['password']); 
        $user = User::create($input); 
        $success['token'] =  $user->createToken('MyApp')-> accessToken; 
        $success['first_name'] =  $user->first_name;
        return response()->json(['success'=>$success,'user'=>$user], $this-> successStatus); 
        // $data = User::where('id',$user->id)->with(['portfolio.address'])->get();
	    // return response()->json(['success'=>$success,'user'=>$data], $this-> successStatus);         
    }

    public function forgot_password(Request $request)
    {
        $email = $request->email;
    }

	/** 
     * details api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function details() 
    { 
        $user = Auth::user();
        $data = User::where('id',$user->id)->with(['portfolio.address'])->get(); 
        return response()->json(['success' => $data],200); 
    }

    public function userFollowers($id)  
    {
        $user = User::where('id',$id)->with('followers')->withCount('followers')->get();
        // return $user;
        return response()->json(['data'=>$user], 200); 
    }

    public function userFollow($id)  
    {
        $user = User::where('id',$id)->with('follow')->withCount('follow')->get();
        // return $user;
        return response()->json(['data'=>$user], 200); 
    }

    public function showpf($id)
    {
        $data = User::where('id',$id)
                ->select('id','first_name','last_name','mobile_no','email','last_login','pf_id','portfolios.cat_id','portfolios.a_id','portfolios.userpic_id','profession','birth_date','achievements','address_line1','address_line2','city','state','pin_code','country')
                ->leftjoin('portfolios','portfolios.user_id','users.id')
                // ->leftjoin('userpics','userpics.user_id','users.id')
                ->leftjoin('addresses','addresses.a_id','users.id')
                ->leftjoin('categories','categories.cat_id','portfolios.cat_id')
                ->with(['portfolio.userpics'])
                ->get();
        return $data;
    }

    public function upload(Request $request)
    {
        $rules = Userpic::$rules;
        $validator = \Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return response($validator->errors(), 403);
        }
        
        if($request->hasfile('file'))
        {
            $name = $request->file('file')->getClientOriginalName();
            $ext = $request->file->extension();
            $request->file->move(public_path().'/uploads/profile', $name);
            $form = new Userpic();
            $form->user_id = $request->user_id;
            $form->status = $request->status;
            $form->file = $name;
            $form->type = $ext;
            $form->save();
        }
        else
        {
            return response()->json(['Image not Uploaded']);
        }

        return response()->json(['success', 'Your images has been successfully']);
    }
}