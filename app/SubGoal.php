<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubGoal extends Model
{
    public function goal(){
        return $this->belongTo('App\Goal');
    }

    public function steps()
    {
        return $this->hasMany('App\Step');
    }
}
