<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PostLikeUnlikeBtn extends Component
{

    public $post;
    public $comment = null;

    /**
     * Create a new component instance.
     */
    public function __construct($post, $comment)
    {
        $this->post = $post;
        $this->comment = $comment;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('posts.actions.btn-like');
    }
}
