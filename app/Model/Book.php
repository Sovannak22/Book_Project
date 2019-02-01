<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title','author','description','book_img'
    ];
    // Relationship between book and category
    public function categories(){
        return $this->belongsToMany('App\Category');
    }
    // Relationship between book and store
    public function store(){
        return $this->belongsTo('App\Store');
    }


}
