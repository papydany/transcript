<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function Faculty()
    {
        return $this->belongsTo('App\Faculty');
    }
    public function Department()
    {
        return $this->belongsTo('App\Department');
    }

    public function Programme()
    {
        return $this->belongsTo('App\Programme');
    }

    public function Category()
    {
        return $this->belongsTo('App\Category');
    }
    public function State()
    {
        return $this->belongsTo('App\State');
    }

    public function Lga()
    {
        return $this->belongsTo('App\Lga');
    }
}
