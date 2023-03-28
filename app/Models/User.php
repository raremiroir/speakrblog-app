<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    
    // Use the username instead of the id
    public function getRouteKeyName() {
        return 'username';
    }

    // Get the posts for the user.
    public function posts() {
        return $this->hasMany(Post::class);
    }

    // Get the likes for the user on posts.
    public function likedPosts() {
        return $this->belongsToMany(Post::class, 'user_likes_post')->withTimestamps();
    }

    // Check if the user is an admin
    public function isAdmin() {
        return $this->role === 'admin';
    }

    // Search function
    public function scopeSearch($query, $search) {
        return $query->where('username', 'LIKE', "%{$search}%");
    }

    // Get comments the user has made
    public function comments() {
        return $this->hasMany(Comment::class);
    }
    // Get likes the user has made on comments
    public function likedComments() {
        return $this->belongsToMany(Comment::class, 'user_likes_comment')->withTimestamps();
    }

    // Get followers of the user
    public function followers() {
        return $this->belongsToMany(User::class, 'user_follows_user', 'followed_id', 'follower_id')->withTimestamps();
    }
    // Get users the user is following
    public function following() {
        return $this->belongsToMany(User::class, 'user_follows_user', 'follower_id', 'followed_id')->withTimestamps();
    }

    // Follow a user
    public function follow(User $user) {
        return $this->following()->attach($user);
    }
    // Unfollow a user
    public function unfollow(User $user) {
        return $this->following()->detach($user);
    }

    // Check if the user is following another user
    public function isFollowing(User $user) {
        return $this->following()->where('followed_id', $user->id)->exists();
    }

    // Check if the user is followed by another user
    public function isFollowedBy(User $user) {
        return $this->followers()->where('follower_id', $user->id)->exists();
    }

    // Change the user's avatar
    public function changeAvatar($avatar) {
        $this->avatar = $avatar;
        $this->save();
    }

}
