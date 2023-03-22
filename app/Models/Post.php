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

    // Get comments for the post.
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // Get the likes for the post.
    public function likes() {
        return $this->belongsToMany(User::class, 'user_likes_post')->withTimestamps();
    }

    // Check if post is liked by user
    public function isLikedByUser(User $user) {
        return $this->likes()->where('user_id', auth()->id())->exists();
    }

    // Get the tags for the post.
    public function tags() {
        return $this->belongsToMany(Tag::class, 'post_has_tag', 'post_id', 'tag_id');
    }

    // Search function
    public function scopeSearch($query, $search) {
        return $query->where('title', 'LIKE', "%{$search}%")
            ->orWhereHas('tags', function($query) use ($search) {
                $query->where('name', 'LIKE', "%{$search}%");
            })
            ->orWhere('body', 'LIKE', "%{$search}%");
    }

    // Assign tags to post
    public function assignTags(array $tags) {
        $this->tags()->detach();
        foreach ($tags as $tag) {
            $tag = Tag::firstOrCreate(['name' => $tag]);
            // $this->tags()->attach($tag->id, ['name' => $tag->name, 'color' => $tag->color]);
        }
    }
}
