<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Category;

class Book extends Model
{

    protected $fillable = [
        'share_name',
        'share_price',
        'share_qty'
    ];
    public function categories(){
        return $this->belongsToMany(Category::class);
    }


}
