<?php

namespace App;

use App\Model\Post;
use App\Model\Follower;
use Kyslik\ColumnSortable\Sortable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens,Notifiable;
    use Sortable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name','mobile_no','activated','role_id', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public $sortable = ['id','first_name','email','created_at'];

    public function findfollower($id){
        $query = User::where('id',$id)->with('followers');
        return $query->get();
    }

    public function followerscount($id){
        $count = Follower::where('follow_to',$id)->count();
        return $count;        
    }

    public function followto($id){
        $query = User::where('id',$id)->with('follow')->get();
        return $query;
    }

    public function followcount($id){
        $count = Follower::where('follow_from',$id)->count();
        return $count;
    }

    public function post(){
        return $this->hasMany(Post::class, 'user_id', 'id');
    }

    public function followers(){
        return $this->hasMany('App\Model\Follower', 'follow_to', 'id');
    }

    public function follow(){
        return $this->hasMany('App\Model\Follower', 'follow_from', 'id');
    }

    public function portfolio(){
        return $this->hasOne('App\Model\Portfolio', 'user_id', 'id');
    }

    public function role(){
        return $this->hasOne('App\Model\Role', 'role_id', 'role_id');
    }
}
