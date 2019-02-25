<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    //
    protected $fillable = [
        'store_name', 'address' , 'phone_number' ,'store_description', 'phone_number','store_type_id'
    ];
    
    // Relationship between store and user
    public function user(){
        return $this->belongsTo('App\User');
    }

    // Relationship between store and store type
    public function store_type(){
        return $this->belongsTo('App\Model\StoreType');
    }

    // Relationship between store and books
    public function books(){
        return $this->hasMany('App\Model\Book');
    }

    // RELATIONSHIP BETWEEN STORE AND SOLD
    public function solds(){
        return $this->hasMany('App\Model\Sold');
    }
}
