<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Model\Book;

class Cart extends Model
{
    public function users(){
        return $this->belongsTo(User::class);
    }
    
    public function books(){
        return $this->belongsToMany(Book::class);
    }
}
