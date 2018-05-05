<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    
    //for many relation example tags
    public function posts()
    {
    	return $this->belongsToMany('App\Post');
    }
}
