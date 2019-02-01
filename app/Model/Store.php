<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = [
        'user_id', 'description', 'store_type_id'
    ];
    // Relationship between store and user
    public function user(){
        return $this->belongsTo('App\User');
    }
    // Relationship between store and store type
    public function store_types(){
        return $this->belongsTo('App\StoreType');
    }
    // Relationship between store and books
    public function books(){
        return $this->hasMany('App\Book');
    }
}
