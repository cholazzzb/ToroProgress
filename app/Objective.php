<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Objective extends Model
{
    public function goal()
    {
        return $this->belongsTo('App\Goal');
    }
    public function steps()
    {
        return $this->hasMany('App\Step');
    }
}
