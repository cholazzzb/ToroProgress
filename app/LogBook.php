<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogBook extends Model
{
    public function goal()
    {
        return $this->belongsTo('App\Goal');
    }
}
