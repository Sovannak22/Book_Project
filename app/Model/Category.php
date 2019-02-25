<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Relationship between category and books
    public function books(){
        return $this->belongsToMany('App\Model\Book');
    }
}
