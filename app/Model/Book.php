<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title','author','description','book_img'
    ];
    // Relationship between book and category
    public function categories(){
        return $this->belongsToMany('App\Model\Category');
    }
    // Relationship between book and store
    public function store(){
        return $this->belongsTo('App\Model\Store');
    }
    // RELATIONSHIP BETWEEN BOOKS AND CONDITION
    public function condition(){
        return $this->belongsTo('App\Model\Condition');
    }
    // RELATIONSHIP BETWEEN BOOKS AND FOR
    public function for(){
        return $this->belongsTo('App\Model\For');
    }

    public function sold(){
        return $this->hasOne('App\Model\Sold');
    }
}
