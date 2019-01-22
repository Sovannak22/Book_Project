<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Book;

class Category extends Model
{
    public function books(){
        return $this->belongsToMany(Book::class);
    }
}
