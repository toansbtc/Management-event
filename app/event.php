<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    //
    public function event()
    {

        return $this->hasMany(User:: class);
    }
}
