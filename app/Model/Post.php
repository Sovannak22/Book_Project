<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = [
      'description'
    ];
    public function user() {
      return $this->belongsTo(User::class);
    }
    public function comments() {
        return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id');
    }
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
