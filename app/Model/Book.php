<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

    protected $fillable = [
        'share_name',
        'share_price',
        'share_qty'
    ];
    public function category(){
        return $this->belongsTo('App/Model/Category');
    }


}
