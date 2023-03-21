<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'body',
        'user_id',
        'post_id',
        // 'parent_id',
    ];

    // Get the user that owns the comment.
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // Get the post that owns the comment.
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    // Get the parent comment that owns the comment.
    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }
    // Get the child comments for the comment.
    public function children()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

    // Get the likes for the comment.
    public function likes()
    {
        return $this->belongsToMany(User::class, 'user_likes_comment')->withTimestamps();
    }


}
