<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Procurement extends Model
{
    //

    protected $table = 'procurement';

    public function posts(){
        return $this->belongsTo('App\Posts');
    }
}
