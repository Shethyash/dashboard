<?php  

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::group([    
    'namespace' => 'Auth',    
    'middleware' => 'api',    
    'prefix' => 'password'
], function () {    
    Route::post('create', 'PasswordResetController@create');
    Route::get('find/{token}', 'PasswordResetController@find');
    Route::post('reset', 'PasswordResetController@reset');
});

Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');
Route::group(['middleware' => 'auth:api'], function(){

	Route::post('details', 'API\UserController@details');
	Route::post('post/store', 'API\PostController@store');

});
Route::post('addlike','API\LikeController@addlike');
Route::post('addfollow','API\FollowerController@addfollow');
Route::post('addcmt','API\CommentController@addcmt');
Route::post('addpf','API\PortfolioController@store');
Route::get('showpost/{id}','API\PostController@showuserpost');
Route::get('showuserfollowpost/{id}','API\PostController@showuserfollowpost');
Route::get('userfollowers/{id}','API\UserController@userFollowers');
Route::get('userfollowto/{id}','API\UserController@userFollow');
Route::get('showpf/{id}', 'API\UserController@showpf');
Route::post('event/register','API\EventController@register');
Route::get('event/show/{id}','API\EventController@showevent');
Route::get('event/participant/{id}','API\EventController@participantlist');
Route::get('event/upcome','API\EventController@upcomingevent');
Route::post('participant/store','API\ParticipantController@store');
Route::post('participant/accept','API\ParticipantController@accept');
Route::post('/upload','API\UserController@upload');