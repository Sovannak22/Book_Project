<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ForModel extends Model
{
    protected $table = 'fors';

    public function books(){
        $this->hasMany('App\Model\Book');
    }
}
