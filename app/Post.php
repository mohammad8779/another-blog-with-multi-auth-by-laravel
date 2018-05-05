<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    
    public function category()
    {
    	return $this->belongsTo('App\Category');
    }
    
    //for many relation example tags
    public function tags()
    {
    	return $this->belongsToMany('App\Tag');
    }

    //for comments

    public function comments(){

    	return $this->hasMany('App\Comment');
    }


}
