<?php

namespace App;
use App\Comment;


use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable=[
        'title',
        'desc',
        
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function addcomment($body){
      $this->comments()->create(compact('body'));
    }



}
