<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StoreType extends Model
{
    // Relationship between storeype and stores
    public function stores(){
        return $this->hasMany('App\Store');
    }
}
