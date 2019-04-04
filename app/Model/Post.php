<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;


class Post extends Model
{
    protected $fillable = [
        'user_id','desc_title','desc_content','created_at',
    ];

    public $sortable = ['user_id','desc_title','desc_content','created_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comment(){
        return $this->hasMany('App\Model\Comment', 'post_id', 'post_id');
        // return $this->hasMany(Post::class, 'user_id', 'id');
    }

    public function postfile(){
        return $this->hasMany('App\Model\Postfile', 'post_id', 'post_id');
        // return $this->hasMany(Post::class, 'user_id', 'id');
    }

    public function like(){
        return $this->hasMany('App\Model\Like', 'post_id', 'post_id');
        // return $this->hasMany(Post::class, 'user_id', 'id');
    }
}
