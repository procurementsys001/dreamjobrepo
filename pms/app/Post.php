<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //

    public function procurement()
    {
        return $this->hasOne('App\Procurement');
    }
}
