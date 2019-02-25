<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Condition extends Model
{
    public function books(){
        $this->hasMany('App\Model\Book');
        
    }
}
