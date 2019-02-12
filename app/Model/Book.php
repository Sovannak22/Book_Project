<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Category;
use App\User;

class Book extends Model
{


    public function categories(){
        return $this->belongsToMany(Category::class);
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }

}
