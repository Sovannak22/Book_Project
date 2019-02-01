<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Category;
use App\Model\Cart;

class Book extends Model
{


    public function categories(){
        return $this->belongsToMany(Category::class);
    }

    public function carts(){
        return $this->belongsToMany(Cart::class);
    }

}
