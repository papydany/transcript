<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegisterCourse extends Model
{
    public function Semester()
    {
        return $this->belongsTo('App\Semester');
    }
}
