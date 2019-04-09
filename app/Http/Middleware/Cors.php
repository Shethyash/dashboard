<?php
namespace App\Http\Middleware;

use Closure;

class Cors
{
   /**
   *Handle
   *@param \Illuminate\Http\Request $request
   *@param \Closure $next
   *@return mixed
   */
   public function handle($request , Closure $next)
   {
   	header('Access-Control-Allow-Origin: *');
     $headers=[
       'Access-Control-Allow-Methods' => 'POST ,GET, PUT, OPTIONS, DELETE',
       'Access-Control-Allow-Headers' => 'Content-Type,X-Auth-Token,Origin,Authorization'
     ];
     if($request->getMethod() == "OPTIONS"){
     	return response()->json('OK',200,$headers);
     }
     $response = $next($request);
     foreach ($headers as $key => $value) {
     	$response->header($key,$value);
     }
     return $response;
    }

//    	return $next($request)
//    	->header('Access-Control-Allow-Origin: *')
//    	->header('Access-Control-Allow-Method' ,'POST ,GET, PUT, OPTIONS, DELETE')
//    	->header('Access-Control-Allow-Headers', 'Content-Type,X-Request-With,Origin,Authorization,Accept')
//    	->header('Access-Control-Allow-Credentials','true');

// }
}

 ?>