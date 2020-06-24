<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function goals()
    {
        return $this->belongsToMany('App\Goal', 'goals_tabs', 'tag_id', 'goal_id');
    }
}
