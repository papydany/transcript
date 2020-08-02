<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public function Faculty()
    {
        return $this->belongsTo('App\Faculty');
    }

    public function students()
    {
        return $this->hasMany('App\Student');
    }
}
