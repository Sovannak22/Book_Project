<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    // REALATIONSHIP BETWEEN BOOK AND CART
    public function books(){
        return $this->belongsToMany('App\Model\Book');
    }
}
