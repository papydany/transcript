<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programme extends Model
{
    public function Category()
    {
        return $this->belongsTo('App\Category');
    }

    public function assignprogrammes()
    {
        return $this->hasMany('App\AssignProgramme');
    }

    public function students()
    {
        return $this->hasMany('App\Student');
    }
}
