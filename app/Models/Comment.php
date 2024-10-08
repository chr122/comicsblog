<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'post_id', 'review', 'comment'];
    

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function post() 
    { 
        return $this->belongsTo(Post::class) -> where('model', self::class); 
    }
}
