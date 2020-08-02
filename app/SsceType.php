<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SsceType extends Model
{
    public function ssce_grades()
    {
        return $this->hasMany('App\SsceGrade');
    }
}
