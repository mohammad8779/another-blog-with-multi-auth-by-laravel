<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //for relating with post

    public function post()
    {
    	return $this->belongsTo('App\Post');
    }
}
