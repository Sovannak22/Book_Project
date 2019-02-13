<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Sold extends Model
{
    public function book(){
        return $this->belongsTo("App\Model\Book");
    }
    public function store(){
        return $this->belongsTo("App\Model\Store");
    }
}
