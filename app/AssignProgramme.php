<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignProgramme extends Model
{
    public function User()
    {
        return $this->belongsTo('App\User');
    }

    public function Programme()
    {
        return $this->belongsTo('App\Programme');
    }
}
