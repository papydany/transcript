<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SsceGrade extends Model
{
    public function SsceType()
    {
        return $this->belongsTo('App\SsceType');
    }

    public function Subject()
    {
        return $this->belongsTo('App\Subject');
    }
}
