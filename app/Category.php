<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function programmes()
    {
        return $this->hasMany('App\Programme');
    }

    public function students()
    {
        return $this->hasMany('App\Student');
    }
}
