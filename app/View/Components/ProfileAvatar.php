<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProfileAvatar extends Component
{

    public $user;
    public $size = 24;

    /**
     * Create a new component instance.
     */
    public function __construct($user, $size = 24)
    {
        $this->user = $user;
        $this->size = $size;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('profile.avatar');
    }
}
