<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    /**
     * Relations
     */

     public function user()
     {
         return $this->belongsTo('App\User');
     }

     public function logBooks()
     {
         return $this->hasMany('App\LogBook');
     }

     public function subGoals()
     {
         return $this->hasMany('App\SubGoal');
     }
}
