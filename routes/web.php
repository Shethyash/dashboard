<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
/*
    get/users (index)
    get/ users/create (create)
    get/ users/1 (show)
    post /users (store)
    get/ users/1/edit (edit)
    patch / users/1 (update)
    delete /users/1 (destroy)
    put,patch,delete
    ->middleware('auth');
*/

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('users','UsersController');
Route::resource('events','EventController');
Route::resource('comments','CommentController');
Route::resource('faqs','FaqController');
Route::resource('follows','FollowController');
Route::resource('portfolios','PortfolioController');
Route::resource('posts','PostController');
Route::resource('likes','LikeController');
Route::post('addlike','LikeController@addlike');