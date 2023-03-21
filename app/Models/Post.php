<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'body',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // Get the likes for the post.
    public function likes() {
        return $this->belongsToMany(User::class, 'user_likes_post')->withTimestamps();
    }

    // Check if post is liked by user
    public function isLikedByUser(User $user)
    {
        return $this->likes()->where('user_id', auth()->id())->exists();
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }
}
