<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lga extends Model
{
    public function students()
    {
        return $this->hasMany('App\Student');
    }
}
