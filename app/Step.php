<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    public function subGoals()
    {
        return $this->belongsTo('App\subGoal');
    }
}
