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

     public function logbooks()
     {
         return $this->hasMany('App\LogBook');
     }
}
