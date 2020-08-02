<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    public function departments()
    {
        return $this->hasMany('App\Department');
    }

    public function students()
    {
        return $this->hasMany('App\Student');
    }
}
