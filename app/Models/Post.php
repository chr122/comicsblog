<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;


class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'title',
        'body',
        'image',
        'category_id',
        'user_id'
    ];
    
    public function getPaginateByLimit(int $limit_count = 5)
    {
        return $this::with('category')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    public function comments()
    { 
        return $this->hasMany(Comment::class); 
    }
    
    public function likes()
    {
    return $this->hasMany(Like::class, 'post_id');
    }
    
    public function is_liked_by_auth_user()
    {
        $id = Auth::id();
    
        $likers = array();
        foreach($this->likes as $like) 
        {
          array_push($likers, $like->user_id);
        }
    
        if (in_array($id, $likers)) 
        {
          return true;
        } 
        else {
          return false;
        }
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
