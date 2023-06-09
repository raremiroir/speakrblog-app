<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\helpers;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'color',
    ];


    // Get posts for the tag.
    public function posts() {
        return $this->belongsToMany(Post::class, 'post_has_tag', 'tag_id', 'post_id');
    }

    // Return all tags as array with id as key and name as value
    public static function getTagsAsArray() {
        $tags = Tag::all();
        $tagsArray = [];
        foreach ($tags as $tag) {
            $tagsArray[$tag->name] = $tag->color;
        }
        return $tagsArray;
    }
}
