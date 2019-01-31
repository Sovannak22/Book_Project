<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Category;

class Book extends Model
{


    public function categories(){
        return $this->belongsToMany(Category::class);
    }


}
