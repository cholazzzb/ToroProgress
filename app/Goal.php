<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{

    protected $fillable = ['name', 'description'];

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

     public function objectives()
     {
         return $this->hasMany('App\Objective');
     }
}
