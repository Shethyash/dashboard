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
Route::get('udata','API\UserController@userdata');
Route::get('udata1','API\UserController@userdata1');
Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');
Route::group(['middleware' => 'auth:api'], function(){

	Route::post('details', 'API\UserController@details');
	Route::post('post/store', 'API\PostController@store');
	Route::post('post/', 'API\PostController@store');
	Route::get('event/show','API\EventController@show');

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
