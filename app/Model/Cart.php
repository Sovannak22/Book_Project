<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Cart extends Model
{
    public function Users(){
        return $this->belongsTo(User::class);
    }
}
