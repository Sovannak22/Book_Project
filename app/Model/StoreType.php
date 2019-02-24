<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class StoreType extends Model
{
    // Relationship between storeype and stores
    public function stores(){
        return $this->hasMany('App\Model\Store');
    }
}
